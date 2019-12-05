(function () {
  if (document.querySelector('.login__error') !== null) {
    M.toast({html: document.querySelector('.login__error').dataset.error});
  }
})();
