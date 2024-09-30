USE sql_injection_lab;



-- สร้างตาราง users_employees
CREATE TABLE IF NOT EXISTS users_employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL,
    department VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);



-- เพิ่มข้อมูลตัวอย่าง
INSERT INTO users_employees (username, password, name, position, department, email) VALUES
('admin', 'password123', 'John Doe', 'Manager', 'Sales', 'john.doe@example.com'),
('user1', 'mypassword', 'Jane Smith', 'Developer', 'IT', 'jane.smith@example.com'),
('user2', 'secretpass', 'Mike Johnson', 'Accountant', 'Finance', 'mike.johnson@example.com'),
('user3', 'letmein', 'Sarah Williams', 'HR Specialist', 'Human Resources', 'sarah.williams@example.com'),
('user4', 'userfourpass', 'Emily Davis', 'Marketing Manager', 'Marketing', 'emily.davis@example.com'),
('user5', 'userfivepass', 'David Wilson', 'Data Analyst', 'IT', 'david.wilson@example.com'),
('user6', 'usersixpass', 'Jessica Brown', 'Software Engineer', 'IT', 'jessica.brown@example.com'),
('user7', 'usersevenpass', 'Michael Garcia', 'Financial Analyst', 'Finance', 'michael.garcia@example.com'),
('user8', 'usereightpass', 'Linda Martinez', 'Sales Representative', 'Sales', 'linda.martinez@example.com'),
('user9', 'userninepass', 'James Taylor', 'Product Manager', 'Product', 'james.taylor@example.com'),
('user10', 'usertenpass', 'Patricia Anderson', 'Customer Support', 'Support', 'patricia.anderson@example.com');

-- สร้างตาราง salaries
CREATE TABLE IF NOT EXISTS salaries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    salary DECIMAL(10, 2) NOT NULL, -- เก็บเงินเดือน
    effective_date DATE NOT NULL,    -- วันที่เริ่มมีผลของเงินเดือน
    FOREIGN KEY (user_id) REFERENCES users_employees(id) ON DELETE CASCADE
);

-- เพิ่มข้อมูลตัวอย่างเงินเดือน
INSERT INTO salaries (user_id, salary, effective_date) VALUES
(1, 75000.00, '2023-01-01'),  -- John Doe
(2, 65000.00, '2023-01-01'),  -- Jane Smith
(3, 60000.00, '2023-01-01'),  -- Mike Johnson
(4, 55000.00, '2023-01-01'),  -- Sarah Williams
(5, 70000.00, '2023-01-01'),  -- Emily Davis
(6, 72000.00, '2023-01-01'),  -- David Wilson
(7, 68000.00, '2023-01-01'),  -- Jessica Brown
(8, 59000.00, '2023-01-01'),  -- Michael Garcia
(9, 80000.00, '2023-01-01'),  -- Linda Martinez
(10, 50000.00, '2023-01-01'); -- Patricia Anderson

-- สร้างตาราง personal_info
CREATE TABLE IF NOT EXISTS personal_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    address VARCHAR(255),      -- ที่อยู่
    city VARCHAR(100),         -- เมือง
    state VARCHAR(100),        -- รัฐ
    postal_code VARCHAR(20),   -- รหัสไปรษณีย์
    country VARCHAR(100),      -- ประเทศ
    phone VARCHAR(15),         -- หมายเลขโทรศัพท์
    date_of_birth DATE,        -- วันเกิด
    FOREIGN KEY (user_id) REFERENCES users_employees(id) ON DELETE CASCADE
);

-- เพิ่มข้อมูลตัวอย่างส่วนตัว
INSERT INTO personal_info (user_id, address, city, state, postal_code, country, phone, date_of_birth) VALUES
(1, '123 Main St', 'New York', 'NY', '10001', 'USA', '555-1111', '1985-05-15'),  -- John Doe
(2, '456 Elm St', 'Los Angeles', 'CA', '90001', 'USA', '555-2222', '1990-06-20'), -- Jane Smith
(3, '789 Maple Ave', 'Chicago', 'IL', '60601', 'USA', '555-3333', '1988-07-25'), -- Mike Johnson
(4, '321 Oak St', 'Houston', 'TX', '77001', 'USA', '555-4444', '1992-08-30'),   -- Sarah Williams
(5, '654 Pine St', 'Phoenix', 'AZ', '85001', 'USA', '555-5555', '1995-09-10'),  -- Emily Davis
(6, '987 Cedar St', 'San Antonio', 'TX', '78201', 'USA', '555-6666', '1987-10-05'), -- David Wilson
(7, '159 Birch St', 'San Diego', 'CA', '92101', 'USA', '555-7777', '1991-11-11'), -- Jessica Brown
(8, '753 Spruce St', 'Dallas', 'TX', '75201', 'USA', '555-8888', '1986-12-12'),  -- Michael Garcia
(9, '951 Walnut St', 'San Jose', 'CA', '95101', 'USA', '555-9999', '1993-01-01'), -- Linda Martinez
(10, '357 Chestnut St', 'Austin', 'TX', '73301', 'USA', '555-0000', '1990-02-14'); -- Patricia Anderson