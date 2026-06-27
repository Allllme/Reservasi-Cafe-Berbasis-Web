import { elements } from "./dom.js";
import { formatDate } from "./date-helper.js";
import { escapeHtml } from "./html-helper.js";

export function renderReservationList(reservations) {
  elements.entryCount.textContent = `${reservations.length} entri`;

  if (reservations.length === 0) {
    elements.reservationList.innerHTML = `
      <div class="empty-state">
        <div>
          <strong>Belum ada reservasi</strong>
          <span>Reservasi yang dibuat akan muncul di sini</span>
        </div>
      </div>
    `;
    return;
  }

  const rows = reservations.map((reservation) => `
    <tr>
      <td>
        <div class="guest-cell">
          <span class="avatar">${escapeHtml(reservation.name.charAt(0).toUpperCase())}</span>
          <div>
            <strong>${escapeHtml(reservation.name)}</strong>
            <div class="muted">${reservation.guests} tamu</div>
          </div>
        </div>
      </td>
      <td>${escapeHtml(reservation.phone)}</td>
      <td>
        <strong>${formatDate(reservation.date)}</strong>
        <div class="muted">${escapeHtml(reservation.time)}</div>
      </td>
      <td><strong>Meja ${reservation.tableNumber}</strong></td>
      <td>${statusBadge(reservation.status)}</td>
      <td>
        <div class="action-group">
          ${reservation.status === "pending" ? `<button class="small-button confirm" data-id="${reservation.id}" data-status="confirmed">Konfirmasi</button>` : ""}
          ${reservation.status !== "cancelled" ? `<button class="small-button" data-id="${reservation.id}" data-status="cancelled">Batalkan</button>` : ""}
        </div>
      </td>
    </tr>
  `).join("");

  elements.reservationList.innerHTML = `
    <table class="data-table">
      <thead>
        <tr>
          <th>Tamu</th>
          <th>Kontak</th>
          <th>Tanggal & Waktu</th>
          <th>Meja</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>${rows}</tbody>
    </table>
  `;
}

function statusBadge(status) {
  const labels = {
    pending: "Menunggu",
    confirmed: "Dikonfirmasi",
    cancelled: "Dibatalkan",
  };

  return `<span class="status ${status}">${labels[status] || status}</span>`;
}
