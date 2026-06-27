import { createReservation } from "./api.js";
import { elements } from "./dom.js";
import { renderTableOptions } from "./table-options.js";
import { showToast } from "./toast.js";

export function initReservationForm({ todayValue, reloadReservations }) {
  elements.form.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(elements.form);
    const payload = Object.fromEntries(formData.entries());

    if (!payload.name || !payload.phone || !payload.date || !payload.time || !payload.guests || !payload.tableNumber) {
      showToast("Mohon lengkapi semua field.");
      return;
    }

    payload.guests = Number(payload.guests);
    payload.tableNumber = Number(payload.tableNumber);

    const response = await createReservation(payload);

    if (!response.ok) {
      showToast("Reservasi gagal dibuat.");
      return;
    }

    elements.form.reset();
    elements.dateInput.value = todayValue;
    renderTableOptions();
    await reloadReservations();
    showToast("Reservasi berhasil dibuat!");
  });
}
