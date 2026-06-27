import { TABLE_CAPACITY, TOTAL_TABLES } from "./config.js";
import { elements } from "./dom.js";
import { formatDate } from "./date-helper.js";

export function renderTableStatus(reservations, todayValue) {
  const selectedDate = elements.statusDateInput.value || todayValue;
  const occupied = new Set(
    reservations
      .filter((reservation) => reservation.date === selectedDate && reservation.status !== "cancelled")
      .map((reservation) => Number(reservation.tableNumber))
  );

  document.getElementById("selectedDateLabel").textContent = selectedDate === todayValue ? "Hari Ini" : formatDate(selectedDate, "long");
  document.getElementById("totalTables").textContent = TOTAL_TABLES;
  document.getElementById("availableTables").textContent = TOTAL_TABLES - occupied.size;
  document.getElementById("occupiedTables").textContent = occupied.size;

  elements.tableGrid.innerHTML = Array.from({ length: TOTAL_TABLES }, (_, index) => {
    const tableNumber = index + 1;
    const isOccupied = occupied.has(tableNumber);

    return `
      <div class="table-card ${isOccupied ? "occupied" : "available"}">
        <span class="table-number">${tableNumber}</span>
        <span class="table-state">${isOccupied ? "Terisi" : "Kosong"}</span>
        <span class="capacity">maks. ${TABLE_CAPACITY[tableNumber]} org</span>
      </div>
    `;
  }).join("");
}
