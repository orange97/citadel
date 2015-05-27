
this_day = Time.now
next_week = 1.week.from_now
seconds_between = next_week - this_day
seconds_in_day = 24 * 60 * 60
days_between = (seconds_between / seconds_in_day).to_i
print "There are " + days_between.to_s + " days between today and the day next week"
