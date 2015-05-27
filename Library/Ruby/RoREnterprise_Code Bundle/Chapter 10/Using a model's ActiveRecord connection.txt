
connection.select_all(sql) 
#returns data in an array of hashes where each hash corresponds to a data row.
connection.select_one(sql) 
#returns a single hash containing the first row of data from the sql call


def total_budget 
sql = “SELECT SUM([value]) as total_budget
FROM [HL_Data_Warehouse].[dbo].[budgets] budget 
INNER JOIN ( 
SELECT MAX([target_on]) as date 
, [task_id] 
FROM [HL_Data_Warehouse].[dbo].[budgets] 
WHERE [project_id] = #{self.id} AND [part_of_parent] = 1 
GROUP BY [task_id] 
) AS last_target_on 
ON last_target_on.date = budget.target_on 
AND last_target_on.task_id = budget.task_id” 
budget = connection.select_one(sql) 
return budget.total_budget 
end

