M.AutoInit();

(function () {
  const elems = document.querySelectorAll('.sidenav');
  const instances = M.Sidenav.init(elems, {
    menuWidth: 300,
    edge: 'right',
    closeOnClick: true,
    draggable: true
  });

})();
