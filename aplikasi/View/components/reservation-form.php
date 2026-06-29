<form id="reservationForm" class="reservation-form">
  <div class="form-grid">
    <label class="field">
      <span>Nama Lengkap</span>
      <input type="text" name="name" placeholder="Nama lengkap" required>
    </label>
    <label class="field">
      <span>Nomor Telepon</span>
      <input type="tel" name="phone" placeholder="Nomor telepon" required>
    </label>
  </div>

  <div class="form-grid">
    <label class="field">
      <span>Tanggal</span>
      <input type="date" name="date" id="dateInput" required>
    </label>
    <label class="field">
      <span>Waktu</span>
      <select name="time" required>
        <option value="">Pilih waktu</option>
        <option>13:00</option>
        <option>14:00</option>
        <option>15:00</option>
        <option>16:00</option>
        <option>17:00</option>
        <option>18:00</option>
        <option>19:00</option>
        <option>20:00</option>
        <option>21:00</option>
        <option>22:00</option>
        <option>23:00</option>
      </select>
    </label>
  </div>

  <div class="form-grid">
    <label class="field">
      <span>Jumlah Tamu</span>
      <input type="number" name="guests" id="guestsInput" min="1" max="6" placeholder="Maks. 6 orang" required>
    </label>
    <label class="field">
      <span>Nomor Meja</span>
      <select name="tableNumber" id="tableSelect" required>
        <option value="">Isi jumlah tamu dulu</option>
      </select>
    </label>
  </div>

  <button class="primary-button" type="submit">Buat Reservasi <span>›</span></button>
</form>
