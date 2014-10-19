talkrate
========

App written in CakePHP that makes it easy to rate conf talk submissions.

Talk selection committee simply rate each talk from 1 to 5 stars, but cannot edit talks.

At some point would like to refactor this, or perhaps include functionality into OpenCfp.

The export in the app contains ALL entries.  Here is a SQL query to get just the overall ratings:
 
 SELECT 
     AVG(tr.rating) as rating,
     t.id, 
     t.name, 
     t.first_name, 
     t.last_name, 
     t.email, 
     t.bio, 
     t.location, 
     t.talk_type, 
     t.talk_level, 
     t.talk_category, 
     t.abstract, 
     t.is_most_desired, 
     t.other_info, 
     t.slides, 
     t.is_sponsor 
 FROM talk_ratings tr 
 LEFT JOIN talks t ON tr.talk_id = t.id 
 GROUP BY talk_id 
 ORDER BY rating DESC
 