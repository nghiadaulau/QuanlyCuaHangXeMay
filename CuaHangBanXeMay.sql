CREATE DATABASE QuanLyCuaHangXeMay
GO

USE QuanLyCuaHangXeMay
GO

CREATE TABLE Khachhang(
	idKhachang nvarchar(50) PRIMARY KEY not null,
	tenKhachang nvarchar(50) not null,
	dienThoai nvarchar(20) not null,
	diaChi nvarchar(50) not null,
	email nvarchar(50),
)
GO

CREATE TABLE NhaCungCap(
	idNhacungcap nvarchar(50) PRIMARY KEY not null,
	tenNhacungcap nvarchar(50) not null,
	dienThoai nvarchar(20) not null,
	diaChi nvarchar(50) not null,
	email nvarchar(50),
)
GO

CREATE TABLE Xe(
	idXe nvarchar(50) PRIMARY KEY not null,
	tenXe nvarchar(50) not null,
	nhaSanxuat nvarchar(50) not null,
	mauSac nvarchar(50) not null,
	soLuong int not null,
	giaTien int not null,
	baoHanh int not null
)
GO

CREATE TABLE NhanVien
(
  	idNhanVien varchar(50) PRIMARY KEY not null,
    tenNhanVien nvarchar(50) not null,
  	ngaySinh nvarchar(30) not null,
    gioiTinh nvarchar(30) not null,
    dienTHoai nvarchar(30) not null,
    chucVU nvarchar(30) not null,
  	luong int not null,
	diaChi nvarchar(30) not null,
)
GO

CREATE TABLE Account
(	
	id INT IDENTITY PRIMARY KEY not null, 
	tenDangNhap nvarchar(30) not null,
  	matKhau nvarchar(30) not null,
  	role int not null
)
GO
