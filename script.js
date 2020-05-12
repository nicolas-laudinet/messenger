document.querySelector('.connexion-btn').addEventListener('click', (e) => {
  e.target.classList.add('connexion-clicked');

  setTimeout(() => {
    e.target.parentNode.classList.add('connexion-hidden');
  }, 500);

  document.querySelector('#main').classList.add('main-slide')
});
