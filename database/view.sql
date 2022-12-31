use quan_ly_hoc_sinh;

create view tongket_hocky as
select hs.MaHocSinh, hs.HoTen, 
	COALESCE(round(avg((select kq.Diem where kq.LoaiDiem = 1)),1), 0) as diem15,
    COALESCE(round(avg((select kq.Diem where kq.LoaiDiem = 2)),1), 0) as diem45,
    COALESCE(round(avg((select kq.Diem where kq.LoaiDiem = 3)),1), 0) as giuaky,
    COALESCE(round(avg((select kq.Diem where kq.LoaiDiem = 4)),1), 0) as cuoiky,
    kq.HocKy, kq.NamHoc, hs.MaLop, mh.TenMonHoc as tenmh
from ketqua kq left join hocsinh hs on kq.MaHS = hs.MaHocSinh left join monhoc mh on mh.MaMonHoc = kq.MaMH
group by kq.MaHS, kq.MaMH, kq.HocKy, kq.NamHoc;

select * from tongket_hocky;

create view diem_tb as
select MaHocSinh, MaLop, HocKy, NamHoc, round((Diem15 + Diem45 * 2 + giuaky * 2 + CuoiKy * 3) / 6, 1) as DiemTB, tenmh
from tongket_hocky;

select * from diem_tb;

create view tb_lop_mon as
select kq.malop, kq.tenmh, l.siso, kq.hocky, kq.namhoc, count(*) as sldat, (count(*) / l.siso * 100) as tiledat
from diem_tb kq left join lop l on l.MaLop = kq.MaLop
where kq.diemtb >=5
group by kq.malop, kq.tenmh, kq.namhoc, kq.hocky;

select * from tb_lop_mon;

create view tb_hocky as
select MaHocSinh, MaLop, HocKy, NamHoc, avg(DiemTB) as tbhk
from diem_tb
group by MaHocSInh, MaLop, HocKy, NamHoc;

select * from tb_hocky;

create view tb_hocky_lop as
select kq.MaLop, l.SiSo, kq.HocKy, kq.NamHoc, count(*) as sdDat
from tb_hocKy kq left join lop l on kq.MaLop = l.MaLop
where tbhk >= 5
group by kq.MaLop, kq.HocKy, kq.NamHoc;

select * from tb_hocky_lop;

select mahocsinh, hoten, diem15, diem45, giuaky, cuoiky from tongket_hocky;