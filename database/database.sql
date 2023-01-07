CREATE DATABASE `Quan_ly_hoc_sinh`;
use `Quan_ly_hoc_sinh`;

create table `TaiKhoan` (
	`MaNguoiDung` char(6) default '0',
    `TenNguoiDung` nvarchar(30) not null,
    `MaKhau` nchar(16) not null,
    `MaActor` char(6),
    primary key (`MaNguoiDung`)
);

create table `HocSinh` (
	`MaHocSinh` char(6) default '0',
	`HoTen` nvarchar(20) not null,
    `GioiTinh` nvarchar(3),
    `NgaySinh` date,
    `Email` nchar(30),
    `DiaChi` nvarchar(40) not null,
    `MaLop` char(6),
    primary key (`MaHocSinh`)
);

create table `GiaoVien`(
	`MaGiaoVien` char(6) default '0',
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

/*Thêm môn học*/
insert into `monhoc` values ('000001', 'Toán', null);
insert into `monhoc` values ('000002', ' Lý', null);
insert into `monhoc` values ('000003', 'Hóa', null);
insert into `monhoc` values ('000004', 'Sinh', null);
insert into `monhoc` values ('000005', 'Sử', null);
insert into `monhoc` values ('000006', 'Địa', null);
insert into `monhoc` values ('000007', 'Văn', null);
insert into `monhoc` values ('000008', 'Đạo đức', null);
insert into `monhoc` values ('000009', 'Thể dục', null);

/*thêm lớp*/
insert into `lop` values ('22/101', null, 2022, null);
insert into `lop` values ('22/102', null, 2022, null);
insert into `lop` values ('22/103', null, 2022, null);
insert into `lop` values ('22/104', null, 2022, null);
insert into `lop` values ('22/111', null, 2022, null);
insert into `lop` values ('22/112', null, 2022, null);
insert into `lop` values ('22/113', null, 2022, null);
insert into `lop` values ('22/121', null, 2022, null);
insert into `lop` values ('22/122', null, 2022, null);

/*thêm học sinh*/
insert into `hocsinh` values ('', 'Kokoro', 'nữ', '2004-11-30', null, 'Tp.HCM', '22/101');
insert into `hocsinh` values ('', 'Shinji', 'nam', '2004-11-30', null, 'Tp.HCM', '22/121');
insert into `hocsinh` values ('', 'Shouta', 'nam', '2004-11-30', null, 'Tp.HCM', '22/111');
insert into `hocsinh` values ('', 'Suzume', 'nữ', '2004-11-30', null, 'Tp.HCM', '22/102');
insert into `hocsinh` values ('', 'Ume', 'nữ', '2004-11-30', null, 'Tp.HCM', '22/103');
insert into `hocsinh` values ('', 'Ayaka', 'nữ', '2004-11-30', null, 'Tp.HCM', '22/104');
insert into `hocsinh` values ('', 'Shika', 'nam', '2004-11-30', null, 'Tp.HCM', '22/112');
insert into `hocsinh` values ('', 'Kuro', 'nam', '2004-11-30', null, 'Tp.HCM', '22/113');
insert into `hocsinh` values ('', 'Sora', 'nam', '2004-11-30', null, 'Tp.HCM', '22/122');
insert into `hocsinh` values ('', 'Yamoto', 'nam', '2004-11-30', null, 'Tp.HCM', '22/101');
insert into `hocsinh` values ('', 'Ayano', 'nữ', '2004-11-30', null, 'Tp.HCM', '22/101');

/*thêm giáo viên*/
insert into `giaovien` values ('', 'Rebecca Hall', 'nữ', curdate(), null, 'Tp.HCM', '000002');
insert into `giaovien` values ('', 'Damien Cameron', 'nam', curdate(), null, 'Tp.HCM', '000001');
insert into `giaovien` values ('', 'Gabriella Pennington', 'nam', curdate(), null, 'Tp.HCM', '000003');
insert into `giaovien` values ('', 'Abraham Meyers', 'nam', curdate(), null, 'Tp.HCM', '000004');
insert into `giaovien` values ('', 'Autumn Frank', 'nam', curdate(), null, 'Tp.HCM', '000005');
insert into `giaovien` values ('', 'Kurt Cole', 'nam', curdate(), null, 'Tp.HCM', '000006');
insert into `giaovien` values ('', 'Maddison Oliver', 'nữ', curdate(), null, 'Tp.HCM', '000007');
insert into `giaovien` values ('', 'Charlotte Yates', 'nữ', curdate(), null, 'Tp.HCM', '000008');
insert into `giaovien` values ('', 'Alyssa Richmond', 'nữ', curdate(), null, 'Tp.HCM', '000009');

/*thêm loại điểm*/
insert into `loaidiem` values(1,'15 phút', 1);
insert into `loaidiem` values(2,'45 phút', 2);
insert into `loaidiem` values(3,'giữa kỳ', 2);
insert into `loaidiem` values(4,'cuối kỳ', 3);

/*thêm kết quả*/
insert into `ketqua` values ('HS0001', '000001', 3, 7, 1, 2022);
insert into `ketqua` values ('HS0002', '000002', 2, 5, 1, 2022);
insert into `ketqua` values ('HS0003', '000003', 1, 8.8, 1, 2022);
insert into `ketqua` values ('HS0004', '000004', 1, 8.5, 1, 2022);
insert into `ketqua` values ('HS0005', '000005', 4, 9, 1, 2022);
insert into `ketqua` values ('HS0006', '000006', 1, 1, 2, 2022);
insert into `ketqua` values ('HS0007', '000007', 1, 4.5, 1, 2021);
insert into `ketqua` values ('HS0008', '000008', 4, 10, 1, 2021);
insert into `ketqua` values ('HS0009', '000009', 2, 6, 2, 2022);
insert into `ketqua` values ('HS0010', '000005', 3, 6.8, 1, 2022);
insert into `ketqua` values ('HS0011', '000007', 1, 7.5, 2, 2022);

/*thêm tài khoản*/
insert into `taikhoan` values ('', 'Yeo Min-Hee', '12345', 'HS0001');
insert into `taikhoan` values ('', 'Dae Dae-Hyun', '12345', 'HS0002');
insert into `taikhoan` values ('', 'Gok Eui', '12345', 'HS0003');
insert into `taikhoan` values ('', 'Seon Moon', '12345', 'HS0004');
insert into `taikhoan` values ('', 'Gar Jee', '12345', 'HS0005');
insert into `taikhoan` values ('', 'Jeom Jin-Sang', '12345', 'HS0006');
insert into `taikhoan` values ('', 'Tak Myung-Suck', '12345', 'HS0007');
insert into `taikhoan` values ('', 'Jo Man-Young', '12345', 'HS0008');
insert into `taikhoan` values ('', 'Bang Tae', '12345', 'HS0009');
insert into `taikhoan` values ('', 'Park So-Young', '12345', 'HS0010');
insert into `taikhoan` values ('', 'Hu Bong', '12345', 'HS0011');
insert into `taikhoan` values ('', 'Ok Kyubok', '12345', 'GV0001');
insert into `taikhoan` values ('', 'Pan Ryung', '12345', 'GV0002');
insert into `taikhoan` values ('', 'Rim Hak-Kun', '12345', 'GV0003');
insert into `taikhoan` values ('', 'Jeong Hyun-Ae', '12345', 'GV0004');
insert into `taikhoan` values ('', 'Geum In-Su', '12345', 'GV0005');
insert into `taikhoan` values ('', 'Ryeo Youngsoo', '12345', 'GV0006');
insert into `taikhoan` values ('', 'In Min-Jung', '12345', 'GV0007');
insert into `taikhoan` values ('', 'U Chung-Cha', '12345', 'GV0008');
insert into `taikhoan` values ('', 'Song Suk', '12345', 'GV0009');

/*thêm lớp-môn học*/
insert into `lop-monhoc`values ('22/101', '000001', 'thứ 2 tiết 1-4');
insert into `lop-monhoc`values ('22/102', '000002', 'thứ 2 tiết 1-4');
insert into `lop-monhoc`values ('22/103', '000003', 'thứ 2 tiết 1-4');
insert into `lop-monhoc`values ('22/104', '000004', 'thứ 2 tiết 1-4');
insert into `lop-monhoc`values ('22/111', '000005', 'thứ 2 tiết 1-4');
insert into `lop-monhoc`values ('22/112', '000006', 'thứ 2 tiết 1-4');
insert into `lop-monhoc`values ('22/113', '000007', 'thứ 2 tiết 1-4');
insert into `lop-monhoc`values ('22/121', '000008', 'thứ 2 tiết 1-4');
insert into `lop-monhoc`values ('22/122', '000009', 'thứ 2 tiết 1-4');

/*thêm lớp-giáo viên*/
insert into `lop-giaovien` values ('22/101', 'GV0001');
insert into `lop-giaovien` values ('22/102', 'GV0002');
insert into `lop-giaovien` values ('22/103', 'GV0003');
insert into `lop-giaovien` values ('22/104', 'GV0004');
insert into `lop-giaovien` values ('22/111', 'GV0005');
insert into `lop-giaovien` values ('22/112', 'GV0006');
insert into `lop-giaovien` values ('22/113', 'GV0007');
insert into `lop-giaovien` values ('22/121', 'GV0008');
insert into `lop-giaovien` values ('22/122', 'GV0009');

/*thêm quy định*/
insert into `quydinh` values (20,40,15,20,5,9);

create table `primary_key` (
	`taikhoan` int unsigned,
    `hocsinh` int unsigned,
    `giaovien` int unsigned
);

insert into primary_key values (0,0,0);

DELIMITER $$
create trigger primary_taikhoan
before insert on taikhoan
for each row
begin
    update `primary_key`
    set taikhoan = taikhoan + 1;
    
    select taikhoan into @tk from primary_key limit 1;
    set new.MaNguoiDung = LPAD(@hs, 6, '0');
end$$
DELIMITER ;

DELIMITER $$
create trigger primary_hocsinh
before insert on hocsinh
for each row
begin
    update `primary_key`
    set hocsinh = hocsinh + 1;
    
    select hocsinh into @hs from primary_key limit 1;
    set new.MaHocSinh = CONCAT('HS', LPAD(@hs, 4, '0'));
    
    update lop l
    set SiSo = SiSio + 1
    where new.MaLop = l.MaLop;
end$$
DELIMITER ;

DELIMITER $$
create trigger primary_giaovien
before insert on giaovien
for each row
begin
    update `primary_key`
    set giaovien = giaovien + 1;
    
    select giaovien into @gv from primary_key limit 1;
    set new.MaGiaoVien = CONCAT('GV', LPAD(@gv, 4, '0'));
end$$
DELIMITER ;

create view tongket_hocky as
select hs.MaHocSinh, hs.HoTen, 
	COALESCE(round(avg((select kq.Diem where kq.LoaiDiem = 1)),1), 0) as diem15,
    COALESCE(round(avg((select kq.Diem where kq.LoaiDiem = 2)),1), 0) as diem45,
    COALESCE(round(avg((select kq.Diem where kq.LoaiDiem = 3)),1), 0) as giuaky,
    COALESCE(round(avg((select kq.Diem where kq.LoaiDiem = 4)),1), 0) as cuoiky,
    kq.HocKy, kq.NamHoc, hs.MaLop, mh.TenMonHoc as tenmh, kq.MaMH as MaMH
from ketqua kq left join hocsinh hs on kq.MaHS = hs.MaHocSinh left join monhoc mh on mh.MaMonHoc = kq.MaMH
group by kq.MaHS, kq.MaMH, kq.HocKy, kq.NamHoc;


create view diem_tb as
select MaHocSinh, MaLop, HocKy, NamHoc, round((Diem15 + Diem45 * 2 + giuaky * 2 + CuoiKy * 3) / 6, 1) as DiemTB, tenmh
from tongket_hocky;

create view tb_lop_mon as
select kq.malop, kq.tenmh, l.siso, kq.hocky, kq.namhoc, count(*) as sldat, (count(*) / l.siso * 100) as tiledat
from diem_tb kq left join lop l on l.MaLop = kq.MaLop
where kq.diemtb >=5
group by kq.malop, kq.tenmh, kq.namhoc, kq.hocky;

create view tb_hocky as
select MaHocSinh, MaLop, HocKy, NamHoc, avg(DiemTB) as tbhk
from diem_tb
group by MaHocSInh, MaLop, HocKy, NamHoc;

create view tb_hocky_lop as
select kq.MaLop, l.SiSo, kq.HocKy, kq.NamHoc, count(*) as sdDat
from tb_hocKy kq left join lop l on kq.MaLop = l.MaLop
where tbhk >= 5
group by kq.MaLop, kq.HocKy, kq.NamHoc;