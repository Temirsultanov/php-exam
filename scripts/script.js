var contactLink = document.querySelector('#contact-link');
if (contactLink) {
    contactLink.addEventListener('click', function(evt){
        evt.preventDefault();
        document.querySelector('#contact').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
    // var cartLink = document.querySelector('.menu__cart');
    // cartLink.addEventListener('mouseover', function(){
    //     contactLink.classList.add('opacity05');
    //     cartLink.classList.add('black');
    // });
    // cartLink.addEventListener('mouseout', function(){
    //     contactLink.classList.remove('opacity05');
    //     cartLink.classList.remove('black');
    // });
    contactLink.addEventListener('mouseover', function(){
        // cartLink.classList.add('opacity05');
        contactLink.classList.add('black');
    });
    contactLink.addEventListener('mouseout', function(){
        // cartLink.classList.remove('opacity05');
        contactLink.classList.remove('black');
    });
}
var burger = document.querySelector('.burger');
if (burger) {
    var burgerTop = burger.querySelector('.burger_top');
    var burgerMiddle = burger.querySelector('.burger_middle');
    var burgerBottom = burger.querySelector('.burger_bottom');
    var menuMobile = document.querySelector('.menu-mobile')

    var onBurgerClick = function() {
        burgerTop.classList.toggle('burgertop-active');
        burgerMiddle.classList.toggle('burgermiddle-active');
        burgerBottom.classList.toggle('burgerbottom-active');
        menuMobile.classList.toggle('translate0');
        document.body.classList.toggle('hidden');
        burger.classList.toggle('scale2');
    };
    burger.addEventListener('click', onBurgerClick);
    window.addEventListener('resize', function(){
        if (document.body.classList.contains('hidden') && window.innerWidth > 840) {
            burgerTop.classList.toggle('burgertop-active');
            burgerMiddle.classList.toggle('burgermiddle-active');
            burgerBottom.classList.toggle('burgerbottom-active');
            menuMobile.classList.toggle('translate0');
            document.body.classList.toggle('hidden');
            burger.classList.toggle('scale2');    
        };
    });
}