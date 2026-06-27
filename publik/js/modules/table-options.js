import { TABLE_CAPACITY } from "./config.js";
import { elements } from "./dom.js";

export function renderTableOptions() {
  const guests = Number(elements.guestsInput.value);
  elements.tableSelect.innerHTML = "";

  if (!guests || guests < 1) {
    elements.tableSelect.add(new Option("Isi jumlah tamu dulu", ""));
    return;
  }

  const eligibleTables = Object.entries(TABLE_CAPACITY)
    .filter(([, capacity]) => capacity >= guests)
    .map(([tableNumber]) => Number(tableNumber));

  if (eligibleTables.length === 0) {
    elements.tableSelect.add(new Option("Tidak ada meja tersedia", ""));
    return;
  }

  elements.tableSelect.add(new Option("Pilih meja", ""));
  eligibleTables.forEach((tableNumber) => {
    elements.tableSelect.add(new Option(`Meja ${tableNumber} - maks. ${TABLE_CAPACITY[tableNumber]} orang`, tableNumber));
  });
}
