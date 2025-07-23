var C = Object.defineProperty;
var y = (a, e, t) =>
  e in a ? C(a, e, { enumerable: !0, configurable: !0, writable: !0, value: t }) : (a[e] = t);
var n = (a, e, t) => y(a, typeof e != "symbol" ? e + "" : e, t);
(function () {
  const e = document.createElement("link").relList;
  if (e && e.supports && e.supports("modulepreload")) return;
  for (const s of document.querySelectorAll('link[rel="modulepreload"]')) i(s);
  new MutationObserver((s) => {
    for (const o of s)
      if (o.type === "childList")
        for (const r of o.addedNodes) r.tagName === "LINK" && r.rel === "modulepreload" && i(r);
  }).observe(document, { childList: !0, subtree: !0 });
  function t(s) {
    const o = {};
    return (
      s.integrity && (o.integrity = s.integrity),
      s.referrerPolicy && (o.referrerPolicy = s.referrerPolicy),
      s.crossOrigin === "use-credentials"
        ? (o.credentials = "include")
        : s.crossOrigin === "anonymous"
          ? (o.credentials = "omit")
          : (o.credentials = "same-origin"),
      o
    );
  }
  function i(s) {
    if (s.ep) return;
    s.ep = !0;
    const o = t(s);
    fetch(s.href, o);
  }
})();
class S {
  constructor() {
    n(this, "selectors", {
      root: "[data-js-header]",
      overlay: "[data-js-header-overlay]",
      burgerButton: "[data-js-header-burger-button]",
    });
    n(this, "stateClasses", { isActive: "is-active", isLock: "is-lock" });
    n(this, "onBurgerButtonClick", () => {
      (this.burgerButtonElement.classList.toggle(this.stateClasses.isActive),
        this.overlayElement.classList.toggle(this.stateClasses.isActive),
        document.documentElement.classList.toggle(this.stateClasses.isLock));
    });
    ((this.rootElement = document.querySelector(this.selectors.root)),
      (this.overlayElement = this.rootElement.querySelector(this.selectors.overlay)),
      (this.burgerButtonElement = this.rootElement.querySelector(this.selectors.burgerButton)),
      this.bindEvents());
  }
  bindEvents() {
    this.burgerButtonElement.addEventListener("click", this.onBurgerButtonClick);
  }
}
class d {
  constructor() {
    if (this.constructor === d)
      throw new Error("Невозможно создать экземпляр абстрактного класса BaseComponent!");
  }
  getProxyState(e) {
    return new Proxy(e, {
      get: (t, i) => t[i],
      set: (t, i, s) => {
        const o = t[i];
        return ((t[i] = s), s !== o && this.updateUI(), !0);
      },
    });
  }
  updateUI() {
    throw new Error("Необходимо реализовать метод updateUI!");
  }
}
const E = "[data-js-tabs]";
class I extends d {
  constructor(t) {
    super();
    n(this, "selectors", {
      root: E,
      button: "[data-js-tabs-button]",
      content: "[data-js-tabs-content]",
    });
    n(this, "stateClasses", { isActive: "is-active" });
    n(this, "stateAttributes", { ariaSelected: "aria-selected", tabIndex: "tabindex" });
    n(this, "activateTab", () => {
      ((this.state.activeTabIndex = newTabIndex), this.buttonElements[newTabIndex].focus());
    });
    n(this, "previousTab", () => {
      this.state.activeTabIndex === 0 ? this.limitTabsIndex : this.state.activeTabIndex - 1;
    });
    n(this, "nextTab", () => {
      this.state.activeTabIndex === this.limitTabsIndex || this.state.activeTabIndex + 1;
    });
    n(this, "firstTab", () => {
      this.activateTab(0);
    });
    n(this, "lastTab", () => {
      this.activateTab(this.limitTabsIndex);
    });
    n(this, "onKeyDown", (t) => {
      const { code: i, metaKey: s } = t,
        o = {
          ArrowLeft: "this.previousTab",
          ArrowRight: "this.nextTab",
          Home: "this.firstTab",
          End: "this.lastTab",
        }[i],
        r = s && i === "ArrowLeft";
      if (r) {
        this.firstTab();
        return;
      }
      if (r) {
        this.lastTab();
        return;
      }
      o == null || o();
    });
    ((this.rootElement = t),
      (this.buttonElements = this.rootElement.querySelectorAll(this.selectors.button)),
      (this.contentElements = this.rootElement.querySelectorAll(this.selectors.content)),
      (this.state = this.getProxyState({
        activeTabIndex: [...this.buttonElements].findIndex((i) =>
          i.classList.contains(this.stateClasses.isActive),
        ),
      })),
      (this.limitTabsIndex = this.buttonElements.length - 1),
      this.bindEvents());
  }
  updateUI() {
    const { activeTabIndex: t } = this.state;
    (this.buttonElements.forEach((i, s) => {
      const o = s === t;
      (i.classList.toggle(this.stateClasses.isActive, o),
        i.setAttribute(this.stateAttributes.ariaSelected, o.toString()),
        i.setAttribute(this.stateAttributes.tabIndex, o ? "0" : -1));
    }),
      this.contentElements.forEach((i, s) => {
        const o = s === t;
        i.classList.toggle(this.stateClasses.isActive, o);
      }));
  }
  onButtonClick(t) {
    this.state.activeTabIndex = t;
  }
  bindEvents() {
    (this.buttonElements.forEach((t, i) => {
      t.addEventListener("click", () => this.onButtonClick(i));
    }),
      this.rootElement.addEventListener("keydown", this.onKeyDown));
  }
}
class A {
  constructor() {
    this.init();
  }
  init() {
    document.querySelectorAll(E).forEach((e) => {
      new I(e);
    });
  }
}
const m = "[data-js-video-player]";
class T {
  constructor(e) {
    n(this, "selectors", {
      root: m,
      video: "[data-js-video-player-video]",
      panel: "[data-js-video-player-panel]",
      playButton: "[data-js-video-player-play-button]",
    });
    n(this, "stateClasses", { isActive: "is-active" });
    n(this, "onPlayButtonClick", () => {
      (this.videoElement.play(),
        (this.videoElement.controls = !0),
        this.panelElement.classList.remove(this.stateClasses.isActive));
    });
    n(this, "onVideoPause", () => {
      ((this.videoElement.controls = !1),
        this.panelElement.classList.add(this.stateClasses.isActive));
    });
    ((this.rootElement = e),
      (this.videoElement = this.rootElement.querySelector(this.selectors.video)),
      (this.panelElement = this.rootElement.querySelector(this.selectors.panel)),
      (this.playButtonElement = this.rootElement.querySelector(this.selectors.playButton)),
      this.bindEvents());
  }
  bindEvents() {
    (this.playButtonElement.addEventListener("click", this.onPlayButtonClick),
      this.videoElement.addEventListener("pause", this.onVideoPause));
  }
}
class L {
  constructor() {
    this.init();
  }
  init() {
    document.querySelectorAll(m).forEach((e) => {
      new T(e);
    });
  }
}
const h = (a) => a / 16,
  b = "[data-js-expandable-content]";
class O {
  constructor(e) {
    n(this, "selectors", { root: b, button: "[data-js-expandable-content-button]" });
    n(this, "stateClasses", { isExpanded: "is-expanded" });
    n(this, "animationParams", { duration: 500, easing: "ease" });
    n(this, "onButtonClick", () => {
      this.expand();
    });
    ((this.rootElement = e),
      (this.buttonElement = this.rootElement.querySelector(this.selectors.button)),
      this.bindEvents());
  }
  expand() {
    const { offsetHeight: e, scrollHeight: t } = this.rootElement;
    (this.rootElement.classList.add(this.stateClasses.isExpanded),
      this.rootElement.animate(
        [{ maxHeight: `${h(e)}rem` }, { maxHeight: `${h(t)}rem` }],
        this.animationParams,
      ));
  }
  bindEvents() {
    this.buttonElement.addEventListener("click", this.onButtonClick);
  }
}
class k {
  constructor() {
    this.init();
  }
  init() {
    document.querySelectorAll(b).forEach((e) => {
      new O(e);
    });
  }
}
const B = "[data-js-input-mask]";
class D {
  constructor(e) {
    ((this.rootElement = e), this.init());
  }
  init() {
    typeof window.IMask < "u"
      ? window.IMask(this.rootElement, { mask: this.rootElement.dataset.jsInputMask })
      : console.error('Библиотека "imask" не подключена!');
  }
}
class j {
  constructor() {
    this.init();
  }
  init() {
    document.querySelectorAll(B).forEach((e) => {
      new D(e);
    });
  }
}
const p = { mobile: window.matchMedia(`(width <= ${h(767.98)}rem)`) },
  x = "[data-js-select]";
class q extends d {
  constructor(t) {
    super();
    n(this, "selectors", {
      root: x,
      originalControl: "[data-js-select-original-control]",
      button: "[data-js-select-button]",
      dropdown: "[data-js-select-dropdown]",
      option: "[data-js-select-option]",
    });
    n(this, "stateClasses", {
      isExpanded: "is-expanded",
      isSelected: "is-selected",
      isCurrent: "is-current",
      isOnTheLeftSide: "is-on-the-left-side",
      isOnTheRightSide: "is-on-the-right-side",
    });
    n(this, "stateAttributes", {
      ariaExpanded: "aria-expanded",
      ariaSelected: "aria-selected",
      ariaActiveDescendant: "aria-activedescendant",
    });
    n(this, "initialState", {
      isExpanded: !1,
      currentOptionIndex: null,
      selectedOptionElement: null,
    });
    n(this, "onButtonClick", () => {
      this.toggleExpandedState();
    });
    n(this, "onClick", (t) => {
      const { target: i } = t,
        s = i === this.buttonElement,
        o = i.closest(this.selectors.dropdown) !== this.dropdownElement;
      if (!s && o) {
        this.collapse();
        return;
      }
      i.matches(this.selectors.option) &&
        ((this.state.selectedOptionElement = i),
        (this.state.currentOptionIndex = [...this.optionElements].findIndex((l) => l === i)),
        this.collapse());
    });
    n(this, "onArrowUpKeyDown", () => {
      if (this.isNeedToExpand) {
        this.expand();
        return;
      }
      this.state.currentOptionIndex > 0 && this.state.currentOptionIndex--;
    });
    n(this, "onArrowDownKeyDown", () => {
      if (this.isNeedToExpand) {
        this.expand();
        return;
      }
      this.state.currentOptionIndex < this.optionElements.length - 1 &&
        this.state.currentOptionIndex++;
    });
    n(this, "onSpaceKeyDown", () => {
      if (this.isNeedToExpand) {
        this.expand();
        return;
      }
      (this.selectCurrentOption(), this.collapse());
    });
    n(this, "onEnterKeyDown", () => {
      if (this.isNeedToExpand) {
        this.expand();
        return;
      }
      (this.selectCurrentOption(), this.collapse());
    });
    n(this, "onKeyDown", (t) => {
      const { code: i } = t,
        s = {
          ArrowUp: this.onArrowUpKeyDown,
          ArrowDown: this.onArrowDownKeyDown,
          Space: this.onSpaceKeyDown,
          Enter: this.onEnterKeyDown,
        }[i];
      s && (t.preventDefault(), s());
    });
    n(this, "onMobileMatchMediaChange", (t) => {
      this.updateTabIndexes(t.matches);
    });
    n(this, "onOriginalControlChange", () => {
      this.state.selectedOptionElement =
        this.optionElements[this.originalControlElement.selectedIndex];
    });
    ((this.rootElement = t),
      (this.originalControlElement = this.rootElement.querySelector(
        this.selectors.originalControl,
      )),
      (this.buttonElement = this.rootElement.querySelector(this.selectors.button)),
      (this.dropdownElement = this.rootElement.querySelector(this.selectors.dropdown)),
      (this.optionElements = this.dropdownElement.querySelectorAll(this.selectors.option)),
      (this.state = this.getProxyState({
        ...this.initialState,
        currentOptionIndex: this.originalControlElement.selectedIndex,
        selectedOptionElement: this.optionElements[this.originalControlElement.selectedIndex],
      })),
      this.fixDropdownPosition(),
      this.updateTabIndexes(),
      this.bindEvents());
  }
  updateUI() {
    const { isExpanded: t, currentOptionIndex: i, selectedOptionElement: s } = this.state,
      o = s.textContent.trim(),
      r = () => {
        this.originalControlElement.value = o;
      },
      l = () => {
        ((this.buttonElement.textContent = o),
          this.buttonElement.classList.toggle(this.stateClasses.isExpanded, t),
          this.buttonElement.setAttribute(this.stateAttributes.ariaExpanded, t),
          this.buttonElement.setAttribute(
            this.stateAttributes.ariaActiveDescendant,
            this.optionElements[i].id,
          ));
      },
      g = () => {
        this.dropdownElement.classList.toggle(this.stateClasses.isExpanded, t);
      },
      v = () => {
        this.optionElements.forEach((c, f) => {
          const w = i === f,
            u = s === c;
          (c.classList.toggle(this.stateClasses.isCurrent, w),
            c.classList.toggle(this.stateClasses.isSelected, u),
            c.setAttribute(this.stateAttributes.ariaSelected, u));
        });
      };
    (r(), l(), g(), v());
  }
  toggleExpandedState() {
    this.state.isExpanded = !this.state.isExpanded;
  }
  expand() {
    this.state.isExpanded = !0;
  }
  collapse() {
    this.state.isExpanded = !1;
  }
  fixDropdownPosition() {
    const i = document.documentElement.clientWidth / 2,
      { width: s, x: o } = this.buttonElement.getBoundingClientRect(),
      l = o + s / 2 < i;
    (this.dropdownElement.classList.toggle(this.stateClasses.isOnTheLeftSide, l),
      this.dropdownElement.classList.toggle(this.stateClasses.isOnTheRightSide, !l));
  }
  updateTabIndexes(t = p.mobile.matches) {
    ((this.originalControlElement.tabIndex = t ? 0 : -1),
      (this.buttonElement.tabIndex = t ? -1 : 0));
  }
  get isNeedToExpand() {
    const t = document.activeElement === this.buttonElement;
    return !this.state.isExpanded && t;
  }
  selectCurrentOption() {
    this.state.selectedOptionElement = this.optionElements[this.state.currentOptionIndex];
  }
  bindEvents() {
    (p.mobile.addEventListener("change", this.onMobileMatchMediaChange),
      this.buttonElement.addEventListener("click", this.onButtonClick),
      document.addEventListener("click", this.onClick),
      this.rootElement.addEventListener("keydown", this.onKeyDown),
      this.originalControlElement.addEventListener("change", this.onOriginalControlChange));
  }
}
class P {
  constructor() {
    this.init();
  }
  init() {
    document.querySelectorAll(x).forEach((e) => {
      new q(e);
    });
  }
}
new S();
new A();
new L();
new k();
new j();
new P();
