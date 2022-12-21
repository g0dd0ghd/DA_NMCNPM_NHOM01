CREATE DATABASE `Quan_ly_hoc_sinh`;
use `Quan_ly_hoc_sinh`;

create table `TaiKhoan` (
	`MaNguoiDung` char(6) not null,
    `TenNguoiDung` nvarchar(30) not null,
    `MaKhau` nchar(16) not null,
    `MaActor` char(6),
    primary key (`MaNguoiDung`)
);

create table `HocSinh` (
	`MaHocSinh` char(6) not null,
	`HoTen` nvarchar(20) not null,
    `GioiTinh` nvarchar(3),
    `NgaySinh` date,
    `Email` nchar(30),
    `DiaChi` nvarchar(40) not null,
    `MaLop` char(6),
    primary key (`MaHocSinh`)
);

create table `GiaoVien`(
	`MaGiaoVien` char(6) not null,
	`HoTen` nvarchar(20) not null,
    `GioiTinh` nvarchar(3),
    `NgaySinh` date,
    `Email` nchar(30),
    `DiaChi` nvarchar(40) not null,
    `Mon` char(6),
    primary key (`MaGiaoVien`)
);

create table `Lop` (
	`MaLop` char(6) not null,
    `SiSo` tinyint,
    `NamHoc` char(11) not null,
    `GiaoVienChuNhiem` char(6),
    primary key (`MaLop`)
);

create table `MonHoc` (
	`MaMonHoc` char(6) not null,
    `TenMonHoc` nvarchar(20) not null,
    `ChuNhiemMon` char(6),
    primary key (`MaMonHoc`)
);

create table `KetQua` (
	`MaHS` char(6),
    `MaMH` char(6),
    `LoaiDiem` int,
	`Diem` float not null,
    `HocKy` tinyint,
	`NamHoc` int,
	primary key (`MaHS`, `MaMH`, `LoaiDiem`, `HocKy`, `NamHoc`)
);

create table `LoaiDiem` (
	`MaLoaiDiem` int not null auto_increment,
    `TenLoaiDiem` nvarchar(20),
    `HeSo` float not null,
    primary key (`MaLoaiDiem`)
);

create table `Lop-MonHoc` (
	`MaLop` char(6),
    `MaMH` char(6),
    `LichHoc` nvarchar(60) not null,
    primary key (`MaLop`, `MaMH`)
);

create table `Lop-GiaoVien` (
	`MaLop` char(6),
    `MaGV` char(6),
    primary key (`MaLop`, `MaGV`)
);

create table `QuyDinh`(
	`SiSoMin` tinyint default 20,
    `SiSoMax` tinyint default 40,
    `TuoiMin` tinyint default 15,
    `TuoiMax` tinyint default 20,
    `DiemDau` tinyint default 5,
    `SoMonHoc` tinyint default 9
);

alter table `HocSinh` add constraint fk_HsLop foreign key (`MaLop`) references lop(`MaLop`);
alter table `GiaoVien` add constraint fk_GvMon foreign key (`Mon`) references monhoc(`MaMonHoc`);
alter table `Lop` add constraint fk_GVCN foreign key (`GiaoVienChuNhiem`) references giaovien(`MaGiaoVien`);
alter table `MonHoc` add constraint fk_CNM foreign key (`ChuNhiemMon`) references giaovien(`MaGiaoVien`);
alter table `KetQua` add constraint fk_Kq_Hs foreign key (`MaHS`) references hocsinh(`MaHocSinh`);
alter table `KetQua` add constraint fk_Kq_Mh foreign key (`MaMH`) references monhoc(`MaMonHoc`);
alter table `KetQua` add constraint fk_Kq_Ld foreign key (`LoaiDiem`) references loaidiem(`MaLoaiDiem`);
alter table `Lop-MonHoc` add constraint fk_MH_Lop foreign key (`MaMH`) references monhoc(`MaMonHoc`);
alter table `Lop-MonHoc` add constraint fk_Lop_MH foreign key (`MaLop`) references lop(`MaLop`);
alter table `Lop-GiaoVien` add constraint fk_GV_Lop foreign key (`MaGV`) references giaovien(`MaGiaoVien`);
alter table `Lop-GiaoVien` add constraint fk_Lop_GV foreign key (`MaLop`) references lop(`MaLop`);

alter table `taikhoan` drop foreign key fk_ActorHS