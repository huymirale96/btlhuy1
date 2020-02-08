-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 01, 2020 lúc 04:16 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `inventory`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `nameCategory` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `addresss` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `idWareHouse` int(11) NOT NULL,
  `listStaff` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nameCutomer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `listCategory` varchar(23) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `enable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exportbill`
--

CREATE TABLE `exportbill` (
  `id` int(11) NOT NULL,
  `exportDate` datetime NOT NULL,
  `exportShipment` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `numberExportShipment` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `importer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `carNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `idCategory` int(11) NOT NULL,
  `idStaff` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exportdetails`
--

CREATE TABLE `exportdetails` (
  `id` int(11) NOT NULL,
  `idExportBill` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `numberOf` int(11) NOT NULL,
  `attention` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `importbill`
--

CREATE TABLE `importbill`importbill (
  `id` int(11) NOT NULL,
  `importDate` datetime NOT NULL,
  `enterShipment` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `numberEnterShipment` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `importer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `carNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `idCategory` int(11) NOT NULL,
  `importDate` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `importdetails`
--

CREATE TABLE `importdetails` (
  `id` int(11) NOT NULL,
  `idImportBill` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `numberOf` int(11) NOT NULL,
  `attention` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nameProduct` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `caculationType` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `weight` float NOT NULL,
  `length` float NOT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updateAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `nameStaff` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `acreage` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `activated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `exportbill`
--
ALTER TABLE `exportbill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `importdetails`
--
ALTER TABLE `importdetails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `exportbill`
--
ALTER TABLE `exportbill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `importdetails`
--
ALTER TABLE `importdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
SELECT
    product.nameProduct,
    SUM(exportdetails.numberOf) as numberExportFirst
FROM
    product,
    exportdetails,
    exportbill
WHERE
    exportdetails.idProduct = product.id AND exportdetails.idexportBill = exportBill.id
GROUP BY
    product.nameProduct

--

/*
SELECT
    product.nameProduct,product.id,
    SUM(exportdetails.numberOf)
FROM
    product,
    exportdetails,
    exportbill
WHERE
    exportdetails.idProduct = product.id AND exportdetails.idexportBill = exportBill.id
and date(exportbill.exportDate) = '2020-01-11'
GROUP BY
    product.nameProduct

ton da - nhap - xuat- ton cuoi

date(exportbill.exportDate) = '2020-01-11'

 ///
SELECT ta.name1, sum(ta.sum1) FROM
(SELECT
    product.nameProduct as name1,
    SUM(exportdetails.numberOf) as sum1
FROM
    product,
    exportdetails,
    exportbill
WHERE
    exportdetails.idProduct = product.id AND exportdetails.idExportBill = exportBill.id
GROUP BY
    product.nameProduct
    UNION ALL
SELECT
    product.nameProduct as name1,
    SUM(importdetails1.numberOf) as sum1
FROM
    product,
    importdetails1,
    importbill
WHERE
    importdetails1.idProduct = product.id AND importdetails1.idImportBill = importbill.id
GROUP BY
    product.nameProduct) as ta 
   
GROUP BY name1

SELECT 
IFNULL(qin.numberOf, 0) - IFNULL(qout.numberOf, 0) AS numberOf2
FROM product p
LEFT JOIN (
    SELECT idProduct, SUM(numberOf) AS numberOf1
    FROM importDetails1
    GROUP BY idProduct
) qin ON p.id = qin.idProduct
LEFT JOIN (
    SELECT idProduct, SUM(numberOf) AS numberOf1
    FROM exportDetails
    GROUP BY idProduct
) qout ON p.Id = qout.idProduct


SELECT
    p.nameProduct,
    (
      IFNULL(qout.numberOf1,0) - IFNULL(qin.numberOf2,0)
    ) AS total
FROM
    (
        product p
    LEFT JOIN(
        SELECT idProduct,
            IFNULL(SUM(numberOf),
            0) AS numberOf2
        FROM
            importDetails1 imp, importbill
        where imp.idImportBill = importbill.id and importbill.importDate < '2020-01-14'
        GROUP BY
            idProduct
    ) qin
ON
    p.id = qin.idProduct
LEFT JOIN(
    SELECT idProduct,
        IFNULL(SUM(numberOf),
        0) AS numberOf1
    FROM
        exportDetails EXP, exportbill
    WHERE
    exportbill.id = EXP.idExportBill AND exportbill.exportDate < '2020-01-14'
    GROUP BY
        idProduct
) qout
ON
    p.Id = qout.idProduct
    )

    //final

    SELECT bang1.namep as tenSanPham, bang1.total as ton1, bang2.total as ton2 , bang3.total as ton3  FROM
(
SELECT
    p.nameProduct as namep,
    (
      IFNULL(qout.numberOf1,0) - IFNULL(qin.numberOf2,0)
    ) AS total
FROM
    (
        product p
    LEFT JOIN(
        SELECT idProduct,
            IFNULL(SUM(numberOf),
            0) AS numberOf2
        FROM
            importDetails1 imp, importbill
        where imp.idImportBill = importbill.id and importbill.importDate < '2020-01-14'
        GROUP BY
            idProduct
    ) qin
ON
    p.id = qin.idProduct
LEFT JOIN(
    SELECT idProduct,
        IFNULL(SUM(numberOf),
        0) AS numberOf1
    FROM
        exportDetails EXP, exportbill
    WHERE
    exportbill.id = EXP.idExportBill AND exportbill.exportDate < '2020-01-14'
    GROUP BY
        idProduct
) qout
ON
    p.Id = qout.idProduct
    )
) bang1 Inner join
(
SELECT
    p.nameProduct as namep,
    (
      IFNULL(qout.numberOf1,0) - IFNULL(qin.numberOf2,0)
    ) AS total
FROM
    (
        product p
    LEFT JOIN(
        SELECT idProduct,
            IFNULL(SUM(numberOf),
            0) AS numberOf2
        FROM
            importDetails1 imp, importbill
        where imp.idImportBill = importbill.id and importbill.importDate < '2020-01-14'
        GROUP BY
            idProduct
    ) qin
ON
    p.id = qin.idProduct
LEFT JOIN(
    SELECT idProduct,
        IFNULL(SUM(numberOf),
        0) AS numberOf1
    FROM
        exportDetails EXP, exportbill
    WHERE
    exportbill.id = EXP.idExportBill AND exportbill.exportDate < '2020-01-14'
    GROUP BY
        idProduct
) qout
ON
    p.Id = qout.idProduct
    )
) bang2 on bang1.namep = bang2.namep
Inner join
(
SELECT
    p.nameProduct as namep,
    (
      IFNULL(qout.numberOf1,0) - IFNULL(qin.numberOf2,0)
    ) AS total
FROM
    (
        product p
    LEFT JOIN(
        SELECT idProduct,
            IFNULL(SUM(numberOf),
            0) AS numberOf2
        FROM
            importDetails1 imp, importbill
        where imp.idImportBill = importbill.id and importbill.importDate < '2020-01-14'
        GROUP BY
            idProduct
    ) qin
ON
    p.id = qin.idProduct
LEFT JOIN(
    SELECT idProduct,
        IFNULL(SUM(numberOf),
        0) AS numberOf1
    FROM
        exportDetails EXP, exportbill
    WHERE
    exportbill.id = EXP.idExportBill AND exportbill.exportDate < '2020-01-14'
    GROUP BY
        idProduct
) qout
ON
    p.Id = qout.idProduct
    )
) bang3 on bang1.namep = bang3.namep



/*

 SELECT bang1.namep as tenSanPham, bang1.codep, bang1.idp, bang1.caculationp,bang1.weightp * bang1.total as weighttotal, bang1.total*bang1.vproduct as vtotal, bang1.vproduct,bang1.total as ton1,  bang2.import1 as bang2import,bang2.export1 as bang2export , bang2.import1*bang1.vproduct as vimporttotalb2,bang2.export1*bang1.weightp as weighttotalexportb2,bang3.total as ton3, bang3.total *bang1.weightp as weighttotalbang3,bang3.total*bang1.vproduct as vtotalbang3 FROM
(
SELECT
    p.nameProduct as namep,p.code as codep,p.id as idp,p.caculationType as caculationp,
    (
     IFNULL(qin.numberOf2,0) -  IFNULL(qout.numberOf1,0)
    ) AS total,p.weight as weightp,p.length*p.width*p.height as vproduct
FROM
    (
        product p
    LEFT JOIN(
        SELECT idProduct,
            IFNULL(SUM(numberOf),
            0) AS numberOf2
        FROM
            importDetails1 imp, importbill
        where imp.idImportBill = importbill.id and importbill.importDate < '2021-01-14'
        GROUP BY
            idProduct
    ) qin
ON
    p.id = qin.idProduct
LEFT JOIN(
    SELECT idProduct,
        IFNULL(SUM(numberOf),
        0) AS numberOf1
    FROM
        exportDetails EXP, exportbill
    WHERE
    exportbill.id = EXP.idExportBill AND exportbill.exportDate < '2021-01-14'
    GROUP BY
        idProduct
) qout
ON
    p.Id = qout.idProduct
    )
) bang1 Inner join
(
SELECT
    p.nameProduct as namep,
     IFNULL(qin.numberOf2,0) as import1, IFNULL(qout.numberOf1,0) as export1,( IFNULL(qin.numberOf2,0) - IFNULL(qout.numberOf1,0) ) as total
FROM
    (
        product p
    LEFT JOIN(
        SELECT idProduct,
            IFNULL(SUM(numberOf),
            0) AS numberOf2
        FROM
            importDetails1 imp, importbill
        where imp.idImportBill = importbill.id and importbill.importDate < '2021-01-14'
        GROUP BY
            idProduct
    ) qin
ON
    p.id = qin.idProduct
LEFT JOIN(
    SELECT idProduct,
        IFNULL(SUM(numberOf),
        0) AS numberOf1
    FROM
        exportDetails EXP, exportbill
    WHERE
    exportbill.id = EXP.idExportBill AND exportbill.exportDate < '2021-01-14'
    GROUP BY
        idProduct
) qout
ON
    p.Id = qout.idProduct
    )
) bang2 on bang1.namep = bang2.namep
Inner join
(
SELECT
    p.nameProduct as namep,
     IFNULL(qin.numberOf2,0) as import, IFNULL(qout.numberOf1,0) as export,( IFNULL(qin.numberOf2,0) - IFNULL(qout.numberOf1,0) ) as total
FROM
    (
        product p
    LEFT JOIN(
        SELECT idProduct,
            IFNULL(SUM(numberOf),
            0) AS numberOf2
        FROM
            importDetails1 imp, importbill
        where imp.idImportBill = importbill.id and importbill.importDate < '2021-01-14'
        GROUP BY
            idProduct
    ) qin
ON
    p.id = qin.idProduct
LEFT JOIN(
    SELECT idProduct,
        IFNULL(SUM(numberOf),
        0) AS numberOf1
    FROM
        exportDetails EXP, exportbill
    WHERE
    exportbill.id = EXP.idExportBill AND exportbill.exportDate < '2021-01-14'
    GROUP BY
        idProduct
) qout
ON
    p.Id = qout.idProduct
    )
) bang3 on bang2.namep = bang3.namep



//////////////////
DELIMITER $$
CREATE PROCEDURE checkinventory (IN beginDay datetime, IN endDay datetime)
BEGIN
  SELECT
        bang1.namep AS namp,
        bang1.codep AS codep,
        bang1.idp AS idP,
        bang1.caculationp as caculationP,
        bang1.weightp * bang1.total AS weighttotal,
        bang1.total * bang1.vproduct AS vtotal,
        bang1.vproduct as vP,
        bang1.total AS ton1,
        bang2.import1 AS bang2import,
        bang2.export1 AS bang2export,
        bang2.import1 * bang1.vproduct AS vimporttotalb2,
        bang2.export1 * bang1.weightp AS weighttotalexportb2,
        bang3.total AS ton3,
        bang3.total * bang1.weightp AS weighttotalbang3,
        bang3.total * bang1.vproduct AS vtotalbang3
    FROM
        (
        SELECT
            p.nameProduct AS namep,
            p.code AS codep,
            p.id AS idp,
            p.caculationType AS caculationp,
            (
                IFNULL(qin.numberOf2, 0) - IFNULL(qout.numberOf1, 0)
            ) AS total,
            p.weight AS weightp,
            p.length * p.width * p.height AS vproduct
        FROM
            (
                product p
            LEFT JOIN(
                SELECT
                    idProduct,
                    IFNULL(SUM(numberOf),
                    0) AS numberOf2
                FROM
                    importDetails1 imp,
                    importbill
                WHERE
                    imp.idImportBill = importbill.id AND importbill.importDate <= beginDay
                GROUP BY
                    idProduct
            ) qin
        ON
            p.id = qin.idProduct
        LEFT JOIN(
            SELECT
                idProduct,
                IFNULL(SUM(numberOf),
                0) AS numberOf1
            FROM
                exportDetails EXP,
                exportbill
            WHERE
                exportbill.id = EXP.idExportBill AND exportbill.exportDate <= beginDay
            GROUP BY
                idProduct
        ) qout
    ON
        p.Id = qout.idProduct
            )
    ) bang1
INNER JOIN(
    SELECT p.nameProduct AS namep,
        IFNULL(qin.numberOf2, 0) AS import1,
        IFNULL(qout.numberOf1, 0) AS export1,
        (
            IFNULL(qin.numberOf2, 0) - IFNULL(qout.numberOf1, 0)
        ) AS total
    FROM
        (
            product p
        LEFT JOIN(
            SELECT
                idProduct,
                IFNULL(SUM(numberOf),
                0) AS numberOf2
            FROM
                importDetails1 imp,
                importbill
            WHERE
                imp.idImportBill = importbill.id AND importbill.importDate <= endDay AND importbill.importDate >= beginDay
            GROUP BY
                idProduct
        ) qin
    ON
        p.id = qin.idProduct
    LEFT JOIN(
        SELECT
            idProduct,
            IFNULL(SUM(numberOf),
            0) AS numberOf1
        FROM
            exportDetails EXP,
            exportbill
        WHERE
            exportbill.id = EXP.idExportBill AND exportbill.exportDate <= endDay AND exportbill.exportDate >= beginDay
        GROUP BY
            idProduct
    ) qout
ON
    p.Id = qout.idProduct
        )
) bang2
ON
    bang1.namep = bang2.namep
INNER JOIN(
    SELECT p.nameProduct AS namep,
        IFNULL(qin.numberOf2, 0) AS IMPORT,
        IFNULL(qout.numberOf1, 0) AS EXPORT,
        (
            IFNULL(qin.numberOf2, 0) - IFNULL(qout.numberOf1, 0)
        ) AS total
    FROM
        (
            product p
        LEFT JOIN(
            SELECT
                idProduct,
                IFNULL(SUM(numberOf),
                0) AS numberOf2
            FROM
                importDetails1 imp,
                importbill
            WHERE
                imp.idImportBill = importbill.id AND importbill.importDate <= endDay
            GROUP BY
                idProduct
        ) qin
    ON
        p.id = qin.idProduct
    LEFT JOIN(
        SELECT
            idProduct,
            IFNULL(SUM(numberOf),
            0) AS numberOf1
        FROM
            exportDetails EXP,
            exportbill
        WHERE
            exportbill.id = EXP.idExportBill AND exportbill.exportDate <= endDay
        GROUP BY
            idProduct
    ) qout
ON
    p.Id = qout.idProduct
        )
) bang3
ON  bang2.namep = bang3.namep;

END; $$
DELIMITER ;


/*<!--//
select product.nameProduct,sum(importdetails.numberOf), sum(exportdetails.numberOf)
FROM product, importdetails, importbill, exportdetails, exportbill
where 
exportbill.id = exportdetails.idExportBill and
importbill.id = importdetails.idImportBill and
exportdetails.idProduct = product.id and
importdetails.idProduct = product.id
//end ton dau
select nameproduct,sum(exportdetail.number),sum(importdetail.number),
pro.cacuaType,code,sum(exportdetail.number) X (dài, rong, cao),


from product, export,import
where sum(exportdetail.number)... export.date > ngay dau and export.date < ngaycuoi

//ton dau
select _sum(exportdetail.number) + sum(importdetail.number),
cacuation where day < ngay cuoi

//end ton dau



/*select product.nameProduct,sum(exportdetails.numberOf)
FROM product, exportdetails
where 
exportdetails.idProduct = product.id
GROUP BY product.nameProduct
SELECT
    product.nameProduct,product.id,
    SUM(importdetails.numberOf),
    SUM(exportdetails.numberOf)
FROM
    product,
    importdetails,
    importbill,
    exportdetails
WHERE
    importdetails.idProduct = product.id AND exportdetails.idProduct = product.id
GROUP BY
    product.nameProduct -->
