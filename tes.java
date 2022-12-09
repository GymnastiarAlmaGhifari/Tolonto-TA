void setJkdtrans() {
    DateTimeFormatter dtf = DateTimeFormatter.ofPattern("ddMMyyyy-");
   LocalDateTime tanggal = LocalDateTime.now();
   String a = (dtf.format(tanggal));
   DateTimeFormatter dtff = DateTimeFormatter.ofPattern("yyyy-MM-dd");
   LocalDateTime tanggall = LocalDateTime.now();
   String aa = (dtff.format(tanggall));
   try {
       //--> melakukan eksekusi query untuk mengambil data dari tabel
       String sql = "SELECT MAX(id_penjualan) FROM penjualan " +
               "WHERE tanggal_transaksi = '" + aa + "' ;" ;
       java.sql.Connection conn = (Connection) Config.configDB();
       java.sql.PreparedStatement pst = conn.prepareStatement(sql);
       java.sql.ResultSet rs = pst.executeQuery(sql);
       while (rs.next()) {
           if (rs.getString(1) == null) {
               jkdtrans.setText("TR-" + a + "001");
           } else {
               rs.last();
               String auto = rs.getString(1);
               auto = auto.replace("TR-" + a, "");
               int auto_id = Integer.parseInt(auto) + 1;
               String no = String.valueOf(auto_id);
               int NomorJual = no.length();
               //MENGATUR jumlah 0
               for (int j = 0; j < 3 - NomorJual; j++) {
                   no = "0" + no;
               }
               jkdtrans.setText("TR-" + a + no);
           }
       }
       rs.close();
       rs.close();
   } catch (Exception e) {
       e.printStackTrace();
   }
}