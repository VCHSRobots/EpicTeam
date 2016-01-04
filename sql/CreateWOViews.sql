/*
** -----------------------------------------------------------------------
** CreateWOViews.sql -- Defines views on the WorkOrder Tables.
**
** Created: 01/01/16 DLB
** -----------------------------------------------------------------------
*/

Use EpicTeam;

/* Drop in Order: */
drop view AllActiveUsersView;
drop view AssignedUsersView;
drop view AppendedDataView;
drop view AssignmentsView;

Create View AssignmentsView As
Select WorkOrders.WID, WorkOrders.Title, WorkOrders.Description, WorkOrders.Project, WorkOrders.Revision,
       WorkOrders.Requestor, WorkOrders.Receiver, WorkOrders.AuthorID, WorkOrders.DateCreated, 
       WorkOrders.DateNeedBy, WorkOrders.Assigned, WorkOrders.Approved, WorkOrders.ApprovedByCap,
       WorkOrders.Finished, WorkOrders.Closed, WorkOrders.Active, Assignments.UserID
       FROM WorkOrders
       JOIN Assignments ON Assignments.WID = WorkOrders.WID
       WHERE WorkOrders.Active = 1 And WorkOrders.Closed = 0; 

Create View AppendedDataView As 
Select AppendedData.WID, AppendedData.UserID, AppendedData.TextInfo, AppendedData.DateCreated,
       AppendedData.Sequence, AppendedData.PicID, AppendedData.PrimaryFile, AppendedData.Removed,
       Users.LastName, Users.FirstName, Users.IPT, Users.Tags, Users.NickName
       FROM AppendedData
       LEFT JOIN Users On AppendedData.UserID = Users.UserID
       ORDER BY AppendedData.Sequence;

Create View AssignedUsersView As
Select Assignments.WID, Users.UserID, Users.UserName, Users.LastName, Users.FirstName, Users.NickName,
       Users.Tags, Users.IPT
       FROM Users 
       JOIN Assignments ON Assignments.UserID = Users.UserID;

Create View AllActiveUsersView As
Select Users.UserID, Users.UserName, Users.LastName, Users.FirstName, Users.NickName, Users.Tags, Users.IPT 
       FROM Users WHERE Users.Active = true;
