use `quan_ly_hoc_sinh`;

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
insert into `hocsinh` values ('HS0001', 'Kokoro', 'nữ', '2004-11-30', null, 'Tp.HCM', '22/101');
insert into `hocsinh` values ('HS0002', 'Shinji', 'nam', '2004-11-30', null, 'Tp.HCM', '22/121');
insert into `hocsinh` values ('HS0003', 'Shouta', 'nam', '2004-11-30', null, 'Tp.HCM', '22/111');
insert into `hocsinh` values ('HS0004', 'Suzume', 'nữ', '2004-11-30', null, 'Tp.HCM', '22/102');
insert into `hocsinh` values ('HS0005', 'Ume', 'nữ', '2004-11-30', null, 'Tp.HCM', '22/103');
insert into `hocsinh` values ('HS0006', 'Ayaka', 'nữ', '2004-11-30', null, 'Tp.HCM', '22/104');
insert into `hocsinh` values ('HS0007', 'Shika', 'nam', '2004-11-30', null, 'Tp.HCM', '22/112');
insert into `hocsinh` values ('HS0011', 'Kuro', 'nam', '2004-11-30', null, 'Tp.HCM', '22/113');
insert into `hocsinh` values ('HS0008', 'Sora', 'nam', '2004-11-30', null, 'Tp.HCM', '22/122');
insert into `hocsinh` values ('HS0009', 'Yamoto', 'nam', '2004-11-30', null, 'Tp.HCM', '22/101');
insert into `hocsinh` values ('HS0010', 'Ayano', 'nữ', '2004-11-30', null, 'Tp.HCM', '22/101');

/*thêm giáo viên*/
insert into `giaovien` values ('GV0001', 'Rebecca Hall', 'nữ', curdate(), null, 'Tp.HCM', '000002');
insert into `giaovien` values ('GV0002', 'Damien Cameron', 'nam', curdate(), null, 'Tp.HCM', '000001');
insert into `giaovien` values ('GV0003', 'Gabriella Pennington', 'nam', curdate(), null, 'Tp.HCM', '000003');
insert into `giaovien` values ('GV0004', 'Abraham Meyers', 'nam', curdate(), null, 'Tp.HCM', '000004');
insert into `giaovien` values ('GV0005', 'Autumn Frank', 'nam', curdate(), null, 'Tp.HCM', '000005');
insert into `giaovien` values ('GV0006', 'Kurt Cole', 'nam', curdate(), null, 'Tp.HCM', '000006');
insert into `giaovien` values ('GV0007', 'Maddison Oliver', 'nữ', curdate(), null, 'Tp.HCM', '000007');
insert into `giaovien` values ('GV0008', 'Charlotte Yates', 'nữ', curdate(), null, 'Tp.HCM', '000008');
insert into `giaovien` values ('GV0009', 'Alyssa Richmond', 'nữ', curdate(), null, 'Tp.HCM', '000009');

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
insert into `taikhoan` values ('000001', 'Yeo Min-Hee', '12345', 'HS0001');
insert into `taikhoan` values ('000002', 'Dae Dae-Hyun', '12345', 'HS0002');
insert into `taikhoan` values ('000003', 'Gok Eui', '12345', 'HS0003');
insert into `taikhoan` values ('000004', 'Seon Moon', '12345', 'HS0004');
insert into `taikhoan` values ('000005', 'Gar Jee', '12345', 'HS0005');
insert into `taikhoan` values ('000006', 'Jeom Jin-Sang', '12345', 'HS0006');
insert into `taikhoan` values ('000007', 'Tak Myung-Suck', '12345', 'HS0007');
insert into `taikhoan` values ('000008', 'Jo Man-Young', '12345', 'HS0008');
insert into `taikhoan` values ('000009', 'Bang Tae', '12345', 'HS0009');
insert into `taikhoan` values ('000010', 'Park So-Young', '12345', 'HS0010');
insert into `taikhoan` values ('000011', 'Hu Bong', '12345', 'HS0011');
insert into `taikhoan` values ('000012', 'Ok Kyubok', '12345', 'GV0001');
insert into `taikhoan` values ('000013', 'Pan Ryung', '12345', 'GV0002');
insert into `taikhoan` values ('000014', 'Rim Hak-Kun', '12345', 'GV0003');
insert into `taikhoan` values ('000015', 'Jeong Hyun-Ae', '12345', 'GV0004');
insert into `taikhoan` values ('000016', 'Geum In-Su', '12345', 'GV0005');
insert into `taikhoan` values ('000017', 'Ryeo Youngsoo', '12345', 'GV0006');
insert into `taikhoan` values ('000018', 'In Min-Jung', '12345', 'GV0007');
insert into `taikhoan` values ('000019', 'U Chung-Cha', '12345', 'GV0008');
insert into `taikhoan` values ('000020', 'Song Suk', '12345', 'GV0009');

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