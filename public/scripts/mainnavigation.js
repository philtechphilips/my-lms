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


        // Sticky Navbar and Course ifo sidebar
        function myFunction() {


             const navBar = document.querySelector('#header-bottom');

             if(document.body.scrollTop > 70 || document.documentElement.scrollTop > 70){
                navBar.className = 'header-bottom-fixed';
             }else{
                navBar.className = 'header-bottom';
             }

             if (document.body.scrollTop > 2500 || document.documentElement.scrollTop > 2500) {
                document.getElementById("course_content_sticky_right").style.visibility = "hidden";
            }
            else {
                document.getElementById("course_content_sticky_right").style.visibility  = "visible";
             }
        }
