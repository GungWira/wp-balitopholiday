/**
 * Custom Navbar Block — navbar.js
 * Hamburger menu toggle dengan slide-in drawer dari kiri
 */
(function () {
  "use strict";

  function initNavbar() {
    const navbar = document.getElementById("custom-navbar");
    if (!navbar) return;

    const hamburger = document.getElementById("navbar-hamburger");
    const drawer = document.getElementById("navbar-drawer");
    const overlay = document.getElementById("navbar-overlay");
    const closeBtn = document.getElementById("navbar-drawer-close");

    if (!hamburger || !drawer || !overlay) return;

    // ── Open Drawer ──────────────────────────────────────────
    function openDrawer() {
      drawer.classList.add("is-open");
      overlay.classList.add("is-visible");
      hamburger.setAttribute("aria-expanded", "true");
      drawer.setAttribute("aria-hidden", "false");
      overlay.setAttribute("aria-hidden", "false");
      document.body.style.overflow = "hidden"; // cegah scroll background

      // Focus ke close button setelah animasi selesai
      setTimeout(function () {
        if (closeBtn) closeBtn.focus();
      }, 320);
    }

    // ── Close Drawer ─────────────────────────────────────────
    function closeDrawer() {
      drawer.classList.remove("is-open");
      overlay.classList.remove("is-visible");
      hamburger.setAttribute("aria-expanded", "false");
      drawer.setAttribute("aria-hidden", "true");
      overlay.setAttribute("aria-hidden", "true");
      document.body.style.overflow = "";

      // Kembalikan focus ke hamburger
      hamburger.focus();
    }

    // ── Toggle ───────────────────────────────────────────────
    function toggleDrawer() {
      const isOpen = drawer.classList.contains("is-open");
      if (isOpen) {
        closeDrawer();
      } else {
        openDrawer();
      }
    }

    // ── Event Listeners ──────────────────────────────────────

    hamburger.addEventListener("click", toggleDrawer);

    if (closeBtn) {
      closeBtn.addEventListener("click", closeDrawer);
    }

    // Klik overlay → tutup drawer
    overlay.addEventListener("click", closeDrawer);

    // Klik link di dalam drawer → tutup drawer
    const drawerLinks = drawer.querySelectorAll(".custom-navbar__drawer-link");
    drawerLinks.forEach(function (link) {
      link.addEventListener("click", function () {
        // Beri sedikit delay agar animasi link terlihat
        setTimeout(closeDrawer, 150);
      });
    });

    // Escape key → tutup drawer
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && drawer.classList.contains("is-open")) {
        closeDrawer();
      }
    });

    // ── Active Link Highlight ─────────────────────────────────
    // Tandai link yang sesuai dengan URL saat ini
    const currentUrl = window.location.href;
    const allLinks = navbar.querySelectorAll(
      ".custom-navbar__menu-link, .custom-navbar__drawer-link",
    );

    allLinks.forEach(function (link) {
      if (link.href === currentUrl || link.href === window.location.pathname) {
        link.classList.add("is-active");
      }
    });

    // ── Hide on Scroll Down / Show on Scroll Up ───────────────
    var lastScrollY = window.scrollY;
    var scrollThreshold = 80; // mulai hide setelah scroll sekian px dari atas

    window.addEventListener(
      "scroll",
      function () {
        var currentScrollY = window.scrollY;
        var diff = currentScrollY - lastScrollY;

        // Jangan hide kalau drawer mobile sedang terbuka
        if (drawer.classList.contains("is-open")) {
          lastScrollY = currentScrollY;
          return;
        }

        if (currentScrollY <= scrollThreshold) {
          // Di area paling atas → selalu tampil, tanpa shadow
          navbar.classList.remove("is-hidden");
          navbar.style.boxShadow = "0 2px 12px rgba(0, 0, 0, 0.08)";
        } else if (diff > 4) {
          // Scroll ke bawah → sembunyikan
          navbar.classList.add("is-hidden");
        } else if (diff < -4) {
          // Scroll ke atas → tampilkan + shadow lebih tegas
          navbar.classList.remove("is-hidden");
          navbar.style.boxShadow = "0 4px 20px rgba(0, 0, 0, 0.12)";
        }

        lastScrollY = currentScrollY;
      },
      { passive: true },
    );

    // ── Resize: tutup drawer jika resize ke desktop ───────────
    let resizeTimer;
    window.addEventListener("resize", function () {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function () {
        if (window.innerWidth > 768 && drawer.classList.contains("is-open")) {
          closeDrawer();
        }
      }, 100);
    });
  }

  // Jalankan setelah DOM siap
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initNavbar);
  } else {
    initNavbar();
  }
})();
