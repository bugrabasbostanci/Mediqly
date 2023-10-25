const toggleMenu = () => {
  const menuItems = document.querySelector(".menu__items");

  const toggler = document.querySelector(".navbar__menu-toggler");
  const src = toggler.getAttribute("src");

  const isBurger = src === "/components/navbar-main/burger-menu.svg";

  const iconName = isBurger
    ? "/components/navbar-main/close.svg"
    : "/components/navbar-main/burger-menu.svg";

  toggler.setAttribute("src", iconName);

  if (!isBurger) {
    menuItems.classList.add("navigation--mobile--fadeout");
    setTimeout(() => {
      menuItems.classList.toggle("navigation--mobile");
    }, 300);
  } else {
    menuItems.classList.remove("navigation--mobile--fadeout");
    menuItems.classList.toggle("navigation--mobile");
  }
};
