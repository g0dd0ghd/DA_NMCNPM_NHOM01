use quan_ly_hoc_sinh;

alter table hocsinh
add constraint gioi_tinh check (GioiTinh = 'nam' or GioiTinh = 'nữ');

alter table hocsinh
add constraint tuoi_HS check (2022 - year(NgaySinh) > 15 and 2022 - year(NgaySinh) < 20)
