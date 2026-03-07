(function () {
  var el        = document.getElementById('tv-loading-screen');
  var maxWait   = 4000;
  var dismissed = false;

  if (!el) return;

  function hideLoading() {
    if (dismissed) return;
    dismissed = true;

    el.classList.add('is-leaving');

    el.addEventListener('transitionend', function () {
      el.classList.add('is-gone');
    }, { once: true });

    setTimeout(function () {
      el.classList.add('is-gone');
    }, 900);
  }

  window.addEventListener('load', function () {
    var minDisplay = 800;
    var elapsed    = performance.now();
    var remaining  = Math.max(0, minDisplay - elapsed);
    setTimeout(hideLoading, remaining);
  });

  setTimeout(hideLoading, maxWait);
})();
