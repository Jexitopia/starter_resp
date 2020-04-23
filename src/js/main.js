var sidebar = document.getElementById('sidebar');
var navLink = document.getElementsByClassName('link');
var latestNews = document.querySelector('.latest-news-grid');
var popularNews = document.querySelector('.popular-news-grid');
var trendingNews = document.querySelector('.trending-news-grid');
var latestButton = document.querySelector('.latest');
var popularButton = document.querySelector('.popular');
var trendingButton = document.querySelector('.trending');
var mainMenu = document.querySelector('#site-navigation');
var searchbar = document.getElementById('search');
var weeklyBest = document.querySelector('.weekly-best-news');
var pageBody = document.querySelector('body');
var mainLogo = document.getElementById('mainlogo');
var headerContainer = document.querySelector('.header-container');
var pageContainer = document.querySelector('.page-container');
var test = document.querySelectorAll('.cat-img .category');
var latestnewslist = document.querySelector('.post-list');
var weeklybest = document.querySelector('.weekly-best-news');
var recommendednews = document.querySelector('.recommended-news');
var latestSwitch = document.querySelector('.latest-switch');
var weeklySwitch = document.querySelector('.weekly-switch');
var footerLogo = document.getElementById('footer-logo');
var recommendedSwitch = document.querySelector('.recommended-switch');

var y;

for (y = 0; y < test.length; y++) {
    test[y].innerHTML = " ";
  }
test.innerHTML = " ";

if (pageBody.classList.contains('night-mode')) {
    footerLogo.src="https://nounow.net/wp-content/themes/nounow/public/images/logowhite.png";
} else {
    footerLogo.src="https://nounow.net/wp-content/themes/nounow/public/images/logo.png";
}

 function swapStyle() {
    if (pageBody.classList.contains('night-mode')) {
        pageBody.classList.remove('night-mode');
        mainLogo.src="https://nounow.net/wp-content/themes/nounow/public/images/logo.png";
        footerLogo.src="https://nounow.net/wp-content/themes/nounow/public/images/logo.png";
        document.cookie = "themeStyle=light-mode; path=/";

    } else {
        pageBody.classList.add('night-mode');
        mainLogo.src="https://nounow.net/wp-content/themes/nounow/public/images/logowhite.png";
        footerLogo.src="https://nounow.net/wp-content/themes/nounow/public/images/logowhite.png";
        document.cookie = "themeStyle=night-mode; path=/";
    } 

    return false;
}

function redirect(x) {
    console.log(x);
}

function toggleMenu() {
    if(mainMenu.classList.contains('show')) {
        mainMenu.classList.remove('show');
        headerContainer.classList.remove('show');
        pageContainer.classList.remove('show');
    } else {
        mainMenu.classList.add('show');
        headerContainer.classList.add('show');
        pageContainer.classList.add('show');
    }
}

function toggleSearch() {
    if(searchbar.classList.contains('show')) {
        searchbar.classList.remove('show');
    } else {
        searchbar.classList.add('show');
        searchbar.focus();
    }
}

var wrapper = document.querySelector('.weekly-best-news');

function showSecond() {
    if (wrapper.classList.contains('third')) {
    wrapper.classList.remove('third');
  }
  if (wrapper.classList.contains('first')) {
    wrapper.classList.remove('first');
  }
  wrapper.classList.add('second');
}

function showThird() {
  if (wrapper.classList.contains('second')) {
    wrapper.classList.remove('second');
  }
  if (wrapper.classList.contains('first')) {
    wrapper.classList.remove('first');
  }
  wrapper.classList.add('third');
}

function showFirst() {
    if (wrapper.classList.contains('second')) {
    wrapper.classList.remove('second');
  }
      if (wrapper.classList.contains('third')) {
    wrapper.classList.remove('third');
  }
  wrapper.classList.add('first');
}

var checkFeatured = document.querySelector('.featured-container');

if (checkFeatured != null) {


var featureimg = document.querySelector('.featured-wrapper .wpp-thumbnail');
var imgheight = featureimg.offsetHeight;

function changeNews(x) {

    latestnewslist.classList.remove('show');
    weeklybest.classList.remove('show');
    recommendednews.classList.remove('show');

    x.classList.add('show');

    if (pageContainer.classList.contains('index-page')) {
        window.scrollTo({ top: imgheight + 5, behavior: 'smooth' });
} else {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
    if(latestnewslist.classList.contains('show')){
        latestSwitch.classList.add('current-switch');
    } else {
        latestSwitch.classList.remove('current-switch');
    }
    if(weeklybest.classList.contains('show')){
        weeklySwitch.classList.add('current-switch');
    } else {
        weeklySwitch.classList.remove('current-switch');
    }
    if(recommendednews.classList.contains('show')){
        recommendedSwitch.classList.add('current-switch');
    } else {
        recommendedSwitch.classList.remove('current-switch');
    }
}



    const _C = document.querySelector('.featured-container .wpp-list'), 
    N = _C.children.length;

let i = 0, x0 = null, locked = false, w;

function unify(e) {	return e.changedTouches ? e.changedTouches[0] : e };

function lock(e) {
x0 = unify(e).clientX;
  _C.classList.toggle('smooth', !(locked = true))

  
};

function drag(e) {
  e.preventDefault();
  
  if(locked) 		
      _C.style.setProperty('--tx', `${Math.round(unify(e).clientX - x0)}px`)

};

function move(e) {
if(locked) {
  let dx = unify(e).clientX - x0, s = Math.sign(dx), 
              f = +(s*dx/w).toFixed(2);

  if((i > 0 || s < 0) && (i < N - 1 || s > 0)) {
          _C.style.setProperty('--i', i -= s);
          f = 1 - f
      }
      
  _C.style.setProperty('--tx', '0px');
      _C.style.setProperty('--f', f);
  _C.classList.toggle('smooth', !(locked = false));
  x0 = null
  if (i == 0) {
    dotContainer.classList.remove('second');
    dotContainer.classList.remove('third');
    dotContainer.classList.add('first');
  } else if (i == 1) {
    dotContainer.classList.remove('first');
    dotContainer.classList.remove('third');
    dotContainer.classList.add('second');
  } else if (i == 2) {
    dotContainer.classList.remove('first');
    dotContainer.classList.remove('second');
    dotContainer.classList.add('third');
  } else {
      console.log('error here');
  }
}
};

function size() { w = window.innerWidth };

size();
_C.style.setProperty('--n', N);

addEventListener('resize', size, false);

_C.addEventListener('mousedown', lock, false);
_C.addEventListener('touchstart', lock, false);

_C.addEventListener('mousemove', drag, false);
_C.addEventListener('touchmove', drag, false);

_C.addEventListener('mouseup', move, false);
_C.addEventListener('touchend', move, false);

var featuredContainer = document.querySelector('.wpp-list');
var containerWidth = featuredContainer.offsetWidth;
var dotContainer = document.querySelector('.dot-container');

function firstPoint() {
    _C.style.setProperty('--i', '0');
    dotContainer.classList.remove('second');
    dotContainer.classList.remove('third');
    dotContainer.classList.add('first');
    lock();
};

function secondPoint() {
    _C.style.setProperty('--i', '1');
    dotContainer.classList.remove('first');
    dotContainer.classList.remove('third');
    dotContainer.classList.add('second');
}

function thirdPoint() {
    _C.style.setProperty('--i', '2');
    dotContainer.classList.remove('first');
    dotContainer.classList.remove('second');
    dotContainer.classList.add('third');
}

}