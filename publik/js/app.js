import { getReservations } from "./modules/api.js";
import { elements } from "./modules/dom.js";
import { toInputDate } from "./modules/date-helper.js";
import { renderReservationList } from "./modules/reservation-list.js";
import { initReservationForm } from "./modules/reservation-form.js";
import { initStatusActions } from "./modules/status-actions.js";
import { initTabs } from "./modules/tabs.js";
import { renderTableOptions } from "./modules/table-options.js";
import { renderTableStatus } from "./modules/table-status.js";

let reservations = [];
const todayValue = toInputDate(new Date());

elements.dateInput.min = todayValue;
elements.dateInput.value = todayValue;
elements.statusDateInput.value = todayValue;

async function reloadReservations() {
  reservations = await getReservations();
  renderReservationList(reservations);
  renderTableStatus(reservations, todayValue);
}

initTabs();
initReservationForm({ todayValue, reloadReservations });
initStatusActions({ reloadReservations });
elements.guestsInput.addEventListener("input", renderTableOptions);
elements.statusDateInput.addEventListener("input", () => renderTableStatus(reservations, todayValue));

renderTableOptions();
reloadReservations();
