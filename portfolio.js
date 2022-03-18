

document.querySelector(".buttons .buy").addEventListener("click", function () {
    console.log(this);
    document.querySelector(".buying").classList.add("selected");
});

document.querySelector(".cross-btn-buy").addEventListener("click", function () {
    document.querySelector(".buying").classList.remove("selected");
})

document.querySelector(".buttons .sell").addEventListener("click", function () {
    console.log(this);
    document.querySelector(".selling").classList.add("selected");
});

document.querySelector(".cross-btn-sell").addEventListener("click", function () {
    document.querySelector(".selling").classList.remove("selected");
})

document.querySelector(".buttons .trade").addEventListener("click", function () {
    console.log(this);
    document.querySelector(".transfer").classList.add("selected");
});

document.querySelector(".cross-btn-transfer").addEventListener("click", function () {
    document.querySelector(".transfer").classList.remove("selected");
})