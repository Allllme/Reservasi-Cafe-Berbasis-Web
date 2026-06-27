import { API_URL } from "./config.js";

export async function getReservations() {
  const response = await fetch(API_URL);
  return response.json();
}

export async function createReservation(payload) {
  return fetch(`${API_URL}&action=create`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload),
  });
}

export async function updateReservationStatus(id, status) {
  return fetch(`${API_URL}&action=update-status`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ id, status }),
  });
}
