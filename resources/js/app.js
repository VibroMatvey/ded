import './bootstrap';
import.meta.glob([
    '../images/**',
    '../fonts/**',
]);


const popupLinks = document.querySelectorAll('.popup-link');
const body = document.querySelector('body');
const lockPadding = document.querySelectorAll('.lock-padding');

let unlock = true;

const timeout = 800;

if (popupLinks.length > 0) {
    for (let index = 0; index < popupLinks.length; index++) {
        const popupLink = popupLinks[index];
        popupLink.addEventListener('click', function (e) {
            const popupName = popupLink.getAttribute('href').replace('#', '');
            const currentPopup = document.getElementById(popupName);
            popupOpen(currentPopup);
            e.preventDefault();
        });
    }
}

const popupCloseIcon = document.querySelectorAll('.close-popup');
if (popupCloseIcon.length > 0) {
    for (let index = 0; index < popupCloseIcon.length; index++) {
        const el = popupCloseIcon[index];
        el.addEventListener('click', function (e) {
            popupClose(el.closest('.popup'));
            e.preventDefault();
        });
    }
}

function popupOpen(currentPopup) {
    if (currentPopup && unlock) {
        const popupActive = document.querySelector('.popup.open');
        if (popupActive) {
            popupClose(popupActive, false);
        } else {
            bodylock();
        }
        currentPopup.classList.add('open');
        currentPopup.addEventListener('click', function (e) {
            if (!e.target.closest('.popup__content')) {
                popupClose(e.target.closest('.popup'));
            }
        });
    }
}

function popupClose (popupActive, doUnlock = true) {
    if (unlock) {
        popupActive.classList.remove('open');
        if (doUnlock) {
            bodyUnLock();
        }
    }
}

function bodylock() {
    const lockPaddingValue = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';

    if (lockPadding.length > 0) {
        for (let index = 0; index < lockPadding.length; index++) {
            const el = lockPadding[index];
            el.style.paddingRight = '0px';
        }
    }
    body.style.paddingRight = lockPaddingValue;
    body.classList.add('lock');

    unlock = false;
    setTimeout(function () {
        unlock = true;
    }, timeout)
}

function bodyUnLock() {
    setTimeout(function () {
        if (lockPadding.length > 0) {
            for (let index = 0; index < lockPadding.length; index++) {
                const el = lockPadding[index];
                el.style.paddingRight = '0px';
            }
        }
        body.style.paddingRight = '0px';
        body.classList.remove('lock');
    })
}

document.addEventListener('keydown', function (e) {
    if (e.which === 27) {
        const popupActive = document.querySelector('.popup.open');
        popupClose(popupActive);
    }
});

const signinBtn = document.querySelector(`#signinBtn`);
const signupBtn = document.querySelector(`#signupBtn`);
const signinBtnSpan = document.querySelector(`.signinBtn`);
const signupBtnSpan = document.querySelector(`.signupBtn`);
const signupContainer = document.querySelector(`.signup`)
const signinContainer = document.querySelector(`.signin`)

signupBtn.addEventListener('click', function (e) {
    e.preventDefault()
    signupContainer.style.display = 'block'
    signinContainer.style.display = 'none'
    document.querySelector(`.form__header h2`).innerHTML = 'Регистрация'
})

signinBtn.addEventListener('click', function (e) {
    e.preventDefault()
    signupContainer.style.display = 'none'
    signinContainer.style.display = 'block'
    document.querySelector(`.form__header h2`).innerHTML = 'Вход'
})

// const logout = document.querySelector(`.logoutLink`)
//
// logout.addEventListener('click', function (e) {
//     e.preventDefault()
//
// })

const btnDropdown = document.querySelector(`#dropdownBtnProducts`)
btnDropdown.addEventListener('click', function (e) {
    const list = document.querySelector(`.products__sort_dropdown_items`)
    if (list.classList.contains('active')) {
        list.classList.remove("active");
    } else {
        list.className += ' active'
    }
})
