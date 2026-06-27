export function toInputDate(date) {
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, "0");
  const day = String(date.getDate()).padStart(2, "0");
  return `${year}-${month}-${day}`;
}

export function formatDate(value, length = "short") {
  const date = new Date(`${value}T00:00:00`);
  const options = length === "long"
    ? { day: "numeric", month: "long", year: "numeric" }
    : { day: "numeric", month: "short", year: "numeric" };

  return new Intl.DateTimeFormat("id-ID", options).format(date);
}
