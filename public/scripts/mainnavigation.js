const menuButton = document.querySelector('.trigger'), closeButton = document.querySelector('.t-close'), addclass = document.querySelector('.site');
menuButton.addEventListener('click', function(){
    addclass.classList.toggle('showmenu')
});
closeButton.addEventListener('click', function(){
    addclass.classList.remove('showmenu')
});




//Show Bottom search
const searchButton = document.querySelector('.t-search'),
      tclose = document.querySelector('.search-close'),
        showClass = document.querySelector('.site');
        searchButton.addEventListener('click', function() {
            showClass.classList.toggle('showsearch')
        });
        tclose.addEventListener('click', function() {
            showClass.classList.remove('showsearch')
        });

