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
