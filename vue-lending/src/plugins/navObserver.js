const $ = el => document.querySelector(el);
const $i = id => document.getElementById(id);

const navObserver = (
  map = {},
  activeClass = "",
  options = {},
  navPrefix = "-nav"
) => {
  const navMap = Object.keys(map).reduce(
    (acc, key) => ({
      ...acc,
      [key]: { nav: $i(`${key}${navPrefix}`), target: $i(key) }
    }),
    {}
  );

  const removeActive = () =>
    $(`.${activeClass}`)?.classList.remove(activeClass);

  const callback = entries => {
    entries.forEach(entry => {
      const { isIntersecting, target } = entry;
      const { id } = target;
      if (!isIntersecting) return;
      removeActive();
      navMap[id].nav.classList.add(activeClass);
    });
  };
  const observer = new IntersectionObserver(callback, options);

  Object.keys(navMap).forEach(key => observer.observe(navMap[key].target));
};

export default navObserver;
