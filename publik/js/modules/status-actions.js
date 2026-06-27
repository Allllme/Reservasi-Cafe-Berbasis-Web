import { updateReservationStatus } from "./api.js";
import { elements } from "./dom.js";
import { showToast } from "./toast.js";

export function initStatusActions({ reloadReservations }) {
  elements.reservationList.addEventListener("click", async (event) => {
    const button = event.target.closest("[data-status]");
    if (!button) return;

    const response = await updateReservationStatus(button.dataset.id, button.dataset.status);

    if (!response.ok) {
      showToast("Status gagal diubah.");
      return;
    }

    await reloadReservations();
    showToast(button.dataset.status === "confirmed" ? "Reservasi dikonfirmasi." : "Reservasi dibatalkan.");
  });
}
