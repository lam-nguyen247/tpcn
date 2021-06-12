document.addEventListener('DOMContentLoaded', function () {
    if (window.location.pathname === '/') {
        let service = new Splide('#splide-service', {
            type: 'loop',
            direction: 'ttb',
            arrows: false,
            height: '750px',
            autoplay: true,
            interval: 3000,
            speed: 3000,
            breakpoints: {
                767: {
                    height: '520px',
                }
            }
        }).mount();

        new Splide('#splide-testimonials', {
            direction: 'ltr',
            type: 'loop',
            perPage: 3,
            autoplay: true,
            interval: 2000,
            flickMaxPages: 3,
            updateOnMove: false,
            pagination: true,
            arrows: false,
            throttle: 300,
            gap: 50,
            breakpoints: {
                1023: {
                    perPage: 2,
                    flickMaxPages: 2,
                    gap: 30
                },
                767: {
                    perPage: 1,
                    flickMaxPages: 1,
                    gap: 30
                }
            }
        }).mount();

    }

    // Typed //
    Typed.new('#typing', {
        strings: ["Website", "Branding", "Marketing"],
        stringsElement: null,
        // typing speed
        typeSpeed: 60,
        // time before typing starts
        startDelay: 600,
        // backspacing speed
        backSpeed: 20,
        // time before backspacing
        backDelay: 500,
        // loop
        loop: true,
        // false = infinite
        loopCount: 1000,
        // show cursor
        showCursor: false,
        // character for cursor
        cursorChar: "|",
        // attribute to type (null == text)
        attr: null,
        // either html or text
        contentType: 'html',
    });
});

// solution click addclass active to parent //
function solutionLink(elem) {
    let a = document.getElementsByTagName('a')
    for (i = 0; i < a.length; i++) {
        // a[i].classList.remove('active');
        a[i].parentNode.classList.remove('active');
    }
    // elem.classList.add('active');
    elem.parentNode.classList.add("active");
}

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function toggleDropdown() {
    document.getElementById("language-content").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('.language-picker__button')) {
        let dropdowns = document.getElementsByClassName("dropdown-content");
        let i;
        for (i = 1; i < dropdowns.length; i++) {
            let openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
    if (document.getElementsByClassName('language-picker__button')[0].contains(event.target)) {
    } else {
        document.getElementById("language-content").classList.remove('show');
    }
}

// Menu onmouseover addclass active //
let header = document.getElementById("navi-menu");
let btns = header.getElementsByClassName("navigation__item");
for (let i = 0; i < btns.length; i++) {
    btns[i].addEventListener("mouseover", function () {
        let current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}
// Modal //
let elements = document.getElementsByClassName("btn-modal");
let addModal = function () {
    document.getElementById('modal-overlay').classList.add('is-visible');
    document.getElementById('modal-form').classList.add('is-visible');
};
let closeModal = function () {
    document.getElementById('modal-overlay').classList.remove('is-visible');
    document.getElementById('modal-form').classList.remove('is-visible');
};
for (let i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', addModal, false);
}

document.getElementById('close-btn').addEventListener('click', closeModal, false);
document.getElementById('modal-overlay').addEventListener('click', closeModal, false);


if (window.location.pathname !== '/contact') {
    let onAppear = [];

    document.addEventListener("DOMContentLoaded", function () {
        onAppear = [].map.call(document.querySelectorAll(".grid-hero-bg"), function (item) {
            return item;
        });
    }, false);

    window.addEventListener("scroll", function () {
        document.getElementById("grid-hero").classList.add("visible");
        onAppear.forEach(function (elem) {
            let vwTop = window.pageYOffset;
            let vwBottom = (window.pageYOffset + window.innerHeight);
            let elemTop = elem.offsetTop;
            let elemHeight = elem.offsetHeight;

            if (vwBottom > elemTop && ((vwTop - elemHeight) < elemTop)) {
                elem.classList.remove("visible");
            } else {
                elem.classList.add("visible");
            }
        });
    }, false);

    let scrollpos = window.scrollY
    const hero = document.getElementById('grid-hero');
    const hero_height = hero.offsetHeight

    const add_class_on_scroll = () => hero.classList.add("fade-in")
    const remove_class_on_scroll = () => hero.classList.remove("fade-in")

    window.addEventListener('scroll', function () {
        scrollpos = window.scrollY;

        if (scrollpos <= hero_height) {
            if (scrollpos > 20) {
                add_class_on_scroll()
            } else {
                remove_class_on_scroll()
            }
        } else {
            remove_class_on_scroll()
        }
    });
}
// scroll //
(function () {
    let doc = document.documentElement;
    let w = window;

    let prevScroll = w.scrollY || doc.scrollTop;
    let curScroll;
    let direction = 0;
    let prevDirection = 0;

    let body = document.getElementById('body-site');

    let checkScroll = function () {

        /*
         ** Find the direction of scroll
         ** 0 - initial, 1 - up, 2 - down
         */

        curScroll = w.scrollY || doc.scrollTop;
        if (curScroll > prevScroll) {
            //scrolled up
            direction = 2;
        } else if (curScroll < prevScroll) {
            //scrolled down
            direction = 1;
        }

        if (direction !== prevDirection) {
            toggleHeader(direction, curScroll);
        }

        prevScroll = curScroll;
    };

    let toggleHeader = function (direction, curScroll) {
        if (direction === 2 && curScroll > 80) {

            //replace 52 with the height of your header in px

            body.classList.add('hide');
            prevDirection = direction;
        } else if (direction === 1) {
            body.classList.remove('hide');
            prevDirection = direction;
        }
    };

    window.addEventListener('scroll', checkScroll);
})();
window.addEventListener('scroll', function () {
    scrollpos = window.scrollY;

    if (scrollpos > 200) {
        document.getElementById('scrolltop').classList.add('active');
    } else {
        document.getElementById('scrolltop').classList.remove('active');
    }
});

// Dark/Light mode //
const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
toggleSwitch.addEventListener('change', (e) => {
    let theme = e.target.checked ? 'dark' : 'light';
    document.documentElement.setAttribute('data-theme', theme);
    fetch('?' + new URLSearchParams({theme :  theme})).then();
});

// collapse new detail
function collapseContent () {
    let mainNav = document.getElementById('collapseSubtitle');
    let navToggle = document.getElementById('headingSubTitle');

    // Establish a function to toggle the class "collapse"
    function mainNavToggle() {
        mainNav.classList.toggle('collapsed');
    }

    // Add a click event to run the mainNavToggle function
    if (navToggle) {
        navToggle.addEventListener('click', mainNavToggle);
    }
}

collapseContent();

