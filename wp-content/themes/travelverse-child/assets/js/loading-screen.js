(function () {
  var el = document.getElementById("tv-loading-screen");
  var maxWait = 4000;
  var dismissed = false;

  if (!el) return;

  function hideLoading() {
    if (dismissed) return;
    dismissed = true;

    el.classList.add("is-leaving");

    el.addEventListener(
      "transitionend",
      function () {
        el.classList.add("is-gone");
      },
      { once: true },
    );

    setTimeout(function () {
      el.classList.add("is-gone");
    }, 900);
  }

  window.addEventListener("load", function () {
    var minDisplay = 800;
    var elapsed = performance.now();
    var remaining = Math.max(0, minDisplay - elapsed);
    setTimeout(hideLoading, remaining);
  });

  setTimeout(hideLoading, maxWait);
})();

// ── Page Transition: tampilkan loading saat klik link ──
document.addEventListener("DOMContentLoaded", function () {
  document.addEventListener("click", function (e) {
    var link = e.target.closest("a");

    if (!link) return;

    var href = link.getAttribute("href");

    // Skip: bukan link biasa
    if (
      !href ||
      href.startsWith("#") ||
      href.startsWith("mailto:") ||
      href.startsWith("tel:") ||
      href.startsWith("javascript:") ||
      link.getAttribute("target") === "_blank" ||
      link.hasAttribute("download") ||
      e.ctrlKey ||
      e.metaKey ||
      e.shiftKey // buka tab baru
    )
      return;

    // Skip: link ke halaman yang sama
    if (link.hostname !== window.location.hostname) return;

    e.preventDefault();

    var el = document.getElementById("tv-loading-screen");
    if (el) {
      // Reset state
      el.classList.remove("is-leaving", "is-gone");
      el.style.clipPath = "inset(100% 0 0% 0)"; // mulai dari bawah
      el.style.transition = "none";

      // Force reflow
      el.offsetHeight;

      // Animate masuk dari bawah ke atas
      el.style.transition = "clip-path 0.5s cubic-bezier(0.76, 0, 0.24, 1)";
      el.style.clipPath = "inset(0 0 0% 0)";
      el.classList.add("is-transitioning");

      setTimeout(function () {
        window.location.href = href;
      }, 520);
    } else {
      window.location.href = href;
    }
  });
});

window.addEventListener("pageshow", function (e) {
  var el = document.getElementById("tv-loading-screen");
  if (!el) return;

  if (e.persisted) {
    // Dari bfcache (back/forward) — langsung sembunyikan
    el.classList.remove("is-transitioning", "is-leaving");
    el.classList.add("is-gone");
  } else {
    // Load normal — hanya bersihkan is-transitioning, biarkan hideLoading yang handle
    el.classList.remove("is-transitioning");
  }
});
