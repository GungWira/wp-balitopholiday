document.addEventListener("DOMContentLoaded", function () {
  const referralWidget = document.querySelector(".js-copy-referral");
  const toast = document.getElementById("bth-toast");

  if (!referralWidget || !toast) return;

  referralWidget.addEventListener("click", function () {
    const code = this.dataset.referral;
    if (!code) return;

    copyText(code);
  });

  function copyText(text) {
    // Clipboard API (HTTPS)
    if (navigator.clipboard && window.isSecureContext) {
      navigator.clipboard.writeText(text).then(showToast);
      return;
    }

    // Fallback (LOCAL / HTTP)
    const tempInput = document.createElement("input");
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);

    showToast();
  }

  function showToast() {
    toast.classList.add("show");

    setTimeout(() => {
      toast.classList.remove("show");
    }, 2500);
  }
});
