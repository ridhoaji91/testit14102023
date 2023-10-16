CREATE TABLE Karyawan (
    NIP INT PRIMARY KEY,
    Nama VARCHAR(255),
    Umur INT,
    Gaji DECIMAL(10, 2),
    Valuta VARCHAR(3)
);

INSERT INTO Karyawan (NIP, Nama, Umur, Gaji, Valuta) VALUES
(001, 'Anton', 25, 650, 'USD'),
(002, 'Budi', 35, 545, 'EUR'),
(003, 'Charles', 30, 7000000, 'IDR'),
(004, 'Dodi', 27, 900, 'USD'),
(005, 'Edwin', 41, 10000000, 'IDR'),
(006, 'Fajar', 20, 750, 'EUR');


CREATE TABLE Kurs (
    Valuta VARCHAR(3) PRIMARY KEY,
    Kurs DECIMAL(10, 2)
);

INSERT INTO Kurs (Valuta, Kurs)
VALUES
    ('IDR', 1.00),
    ('USD', 10000.00),
    ('EUR', 9000.00),
    ('CNY', 150.00),
    ('JPY', 200.00);
