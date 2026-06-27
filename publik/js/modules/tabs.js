import { elements } from "./dom.js";

export function initTabs() {
  elements.tabs.forEach((button) => {
    button.addEventListener("click", () => {
      const target = button.dataset.tab;

      elements.tabs.forEach((item) => item.classList.toggle("active", item === button));
      Object.entries(elements.panels).forEach(([key, panel]) => {
        panel.classList.toggle("active", key === target);
      });
    });
  });
}
