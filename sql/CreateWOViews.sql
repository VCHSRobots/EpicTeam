/*
** -----------------------------------------------------------------------
** CreateWOViews.sql -- Defines views on the WorkOrder Tables.
**
** Created: 01/01/16 DLB
** -----------------------------------------------------------------------
*/

Use EpicTeam;

/* Drop in Order: */
drop view AssignmentsView;

Create View AssignmentsView As
Select WorkOrders.WID, WorkOrders.Title, WorkOrders.Description, WorkOrders.Project, WorkOrders.Revision,
       WorkOrders.Requestor, WorkOrders.Receiver, WorkOrders.AuthorID, WorkOrders.DateCreated, 
       WorkOrders.DateNeedBy, WorkOrders.Assigned, WorkOrders.Approved, WorkOrders.ApprovedByCap,
       WorkOrders.Finished, WorkOrders.Closed, WorkOrders.Active, Assignments.UserID
       FROM WorkOrders
       JOIN Assignments ON Assignments.WID = WorkOrders.WID
       WHERE WorkOrders.Active = 1 And WorkOrders.Closed = 0; 
