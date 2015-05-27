
SELECT SUM([value]) as total_budget
FROM [Data_Warehouse].[dbo].[budgets] budget
INNER JOIN ( 
SELECT MAX([target_on]) as date 
, [task_id] 
FROM [Data_Warehouse].[dbo].[budgets] 
WHERE [project_id] = 147 AND [part_of_parent] = 1 
GROUP BY [task_id]
) AS last_target_on
ON last_target_on.date = budget.target_on
AND last_target_on.task_id = budget.task_id


def total_budget 
sql = "SELECT SUM([value]) as total_budget 
FROM [HL_Data_Warehouse].[dbo].[budgets] budget
INNER JOIN ( 
SELECT MAX([target_on]) as date 
, [task_id] 
FROM [HL_Data_Warehouse].[dbo].[budgets] 
WHERE [project_id] = #{self.id} AND [part_of_parent] = 1 
GROUP BY [task_id] 
) AS last_target_on 
ON last_target_on.date = budget.target_on 
AND last_target_on.task_id = budget.task_id" 
budget = Budget.find_by_sql(sql) 
return budget[0].total_budget 
end

