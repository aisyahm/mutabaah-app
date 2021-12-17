const popUpGroup = document.querySelector(".new-group-pop-up"),
  shadowPopUp = document.querySelector(".shadow"),
  newGroups = document.querySelectorAll(".new-group-btn"),
  closeBtn = document.querySelectorAll(".close");

const newGroup = () => {
  popUpGroup.classList.add("active");
  shadowPopUp.classList.add("active");

  closeBtn.forEach(close => {
    close.addEventListener(("click"), () => {
      popUpGroup.classList.remove("active");
      shadowPopUp.classList.remove("active");
    });
  });

  shadowPopUp.addEventListener(("click"), () => {
    popUpGroup.classList.remove("active");
    shadowPopUp.classList.remove("active");
  });
}
newGroups.forEach(e => {
  e.addEventListener("click", newGroup);
});

if (document.querySelector(".alert")) newGroup();

const account = document.querySelector(".account"),
  popUpAccount = document.querySelector(".account-pop-up");

const accountDetail = () => {
  popUpAccount.classList.add("active");
  shadowPopUp.classList.add("active");

  closeBtn.forEach(close => {
    close.addEventListener(("click"), () => {
      popUpAccount.classList.remove("active");
      shadowPopUp.classList.remove("active");
    });
  });

  shadowPopUp.addEventListener(("click"), () => {
    popUpAccount.classList.remove("active");
    shadowPopUp.classList.remove("active");
  });
}

account.addEventListener("click", accountDetail);