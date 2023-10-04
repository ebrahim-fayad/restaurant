let allLinks = document.querySelectorAll('.list-group a');
allLinks.forEach(a => {
  a.classList.remove('active')
  if (a.href == window.location.href) {
    a.classList.add('active')
  }
})