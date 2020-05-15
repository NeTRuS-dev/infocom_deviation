CREATE DATABASE [DeviationDB];

GO
USE [DeviationDB];
CREATE TABLE [rows]
(
    [id] INT PRIMARY KEY IDENTITY(1, 1),
    [value] INT NOT NULL,
    );
GO

CREATE PROCEDURE [DeviationDB].[calculate]
AS
DECLARE @n int;
DECLARE @SigmaFromPure float;
DECLARE @SigmaFromPow float;
DECLARE @a2 float;
DECLARE @m float;
DECLARE @D float;
SET @n = (SELECT COUNT([rows].[value]) as [Count]
          FROM [rows]);
SET @SigmaFromPure = (SELECT SUM([rows].[value]) as [Sigma]
                      FROM [rows]);
SET @SigmaFromPow = (SELECT SUM([rows].[value]*[rows].[value]) as [PowSigma]
                     FROM [rows]);
SET @m=(SELECT @SigmaFromPure/@n);
SET @a2=(SELECT @SigmaFromPow/@n);
SET @D=(SELECT @a2-(@m*@m));
TRUNCATE TABLE [rows];
SELECT @D;
GO

-- using
EXEC [DeviationDB].[calculate];
GO