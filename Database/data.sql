CREATE DATABASE compliance_db;

USE compliance_db;

-- Table to store audits
CREATE TABLE audits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    audit_name VARCHAR(255),
    status VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table to store risk assessments
CREATE TABLE risk_assessments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    assessment_name VARCHAR(255),
    risk_level VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table to store regulations
CREATE TABLE regulations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    regulation_name VARCHAR(255),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table to store notifications
CREATE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




-- Table for storing uploaded documents
CREATE TABLE uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for storing AI analysis results
CREATE TABLE ai_analysis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    document_id INT,
    audit_details TEXT,
    risk_assessments TEXT,
    compliance_issues TEXT,
    notifications TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (document_id) REFERENCES uploaded_documents(id)
);
