SELECT ROUND(AVG(`price`)) as '平均' ,
	   Max(`price`) as '最高花費',
       MIN(`price`) as '最低花費',
       count(`price`) as '筆數',
       sum(`price`) as '總花費'
FROM `records`


CONCAT
SELECT CONCAT('使用者-',`name`) as '地區' FROM `place`

GROUP_CONCAT
SELECT GROUP_CONCAT(`note`) as '內容' FROM `records` GROUP BY `type`

DATE
SELECT day(`date`) as '日期', GROUP_CONCAT(`note`) as '內容' FROM `records` GROUP BY date(`date`)

CASE WHEN
SELECT `school_num` , 
	CASE 
         WHEN `score`>=60 THEN '及格'
         WHEN `score`<60 THEN '不及格'
         ELSE '資料錯誤'
    END  as '成績'
FROM `student_scores`



Join

SELECT `class_code`, count(*) as '人數' FROM `class_student` GROUP BY `class_code`


1.
SELECT * FROM `classes` ,`class_student`

2.
SELECT `class_code`,
		count(*) as '人數' 
FROM `classes` ,`class_student` 
WHERE `class_student`.`class_code`=`classes`.`code`  
GROUP BY `class_code`

3.
SELECT `class_student`.`class_code`,
	   `classes`.`name`,
		count(*) as '人數' 
FROM `classes` ,`class_student` 
WHERE `class_student`.`class_code`=`classes`.`code`  
GROUP BY  `class_student`.`class_code`

綜合其他語法
SELECT `class_student`.`class_code`,
	   `classes`.`name`,
		count(*) as '人數' 
FROM `classes` , `class_student` 
WHERE `class_student`.`class_code`=`classes`.`code`  && 
		`class_student`.`class_code` IN ('101','103','110')

GROUP BY  `class_student`.`class_code`

LEFT JOIN
SELECT `classes`.`code`,
	   `classes`.`name`,
		count(`class_student`.`seat_num`) as '人數' 
FROM  `classes`
LEFT JOIN `class_student` ON `class_student`.`class_code`=`classes`.`code` 
GROUP BY  `class_student`.`class_code`,`classes`.`name`
ORDER BY `classes`.`code` 


INNER JOIN

SELECT `classes`.`code`,
	   `classes`.`name`,
		count(`class_student`.`seat_num`) as '人數' 
FROM  `classes`
Inner JOIN `class_student` ON `class_student`.`class_code`=`classes`.`code` 
GROUP BY  `class_student`.`class_code`,`classes`.`name`
ORDER BY `classes`.`code` 

計算班級平均成績
SELECT `class_student`.`class_code`,
		AVG(`student_scores`.`score`) as '平均成績' 
FROM  `class_student`, `student_scores` 
WHERE `class_student`.`school_num`=`student_scores`.`school_num` 
GROUP BY  `class_student`.`class_code`
ORDER BY `class_student`.`class_code` 



比較WHERE和INNERJOIN
SELECT `class_student`.`class_code`,
	   `classes`.`name`,
       count(`class_student`.`school_num`) as '人數',
		AVG(`student_scores`.`score`) as '平均成績' 
FROM  `class_student`, `student_scores` ,`classes`
WHERE `class_student`.`school_num`=`student_scores`.`school_num` &&
      `class_student`.`class_code`=`classes`.`code`
	  
GROUP BY  `class_student`.`class_code`
ORDER BY `class_student`.`class_code` 


SELECT `class_student`.`class_code`,
	   `classes`.`name`,
       count(`class_student`.`school_num`) as '人數',
		AVG(`student_scores`.`score`) as '平均成績' 
FROM  `class_student`
INNER JOIN `student_scores` ON `class_student`.`school_num` = `student_scores`.`school_num`
INNER JOIN `classes` ON `class_student`.`class_code`=`classes`.`code`
GROUP BY  `class_student`.`class_code`
ORDER BY `class_student`.`class_code` 


SELECT  `class_student`.`class_code`,
        `classes`.`name`,
        count(`class_student`.`school_num`) as '人數',
        AVG(`student_scores`.`score`) as '平均成績',
        (SELECT AVG(`student_scores`.`score`) from `student_scores`) as '全校平均'
FROM `class_student`
INNER JOIN `student_scores` ON `class_student`.`school_num` = `student_scores`.`school_num`
INNER JOIN `classes` ON `class_student`.`class_code`=`classes`.`code`
GROUP BY `class_student`.`class_code`
ORDER BY `class_student`.`class_code`

班級人數
SELECT `class_code`,count(`id`) from `class_student` group by `class_code`

班級成績
SELECT `class_code` , avg(`student_scores`.`score`) as 'score' 
FROM `class_student`,`student_scores` 
WHERE `class_student`.`school_num`=`student_scores`.`school_num`
GROUP BY `class_student`.`class_code`


子查詢 FROM
SELECT 
    `A`.`class_code`,
    `classes`.`name`,
    `A`.`人數`,
    `B`.`score`
FROM (SELECT `class_code`,count(`id`) as '人數' from `class_student` group by `class_code`)A,
     (SELECT `class_code` , avg(`student_scores`.`score`) as 'score' 
      FROM `class_student`,`student_scores` 
      WHERE `class_student`.`school_num`=`student_scores`.`school_num`
      GROUP BY `class_student`.`class_code`)B,
      `classes`
WHERE `A`.`class_code`=`B`.`class_code`  && `A`.`class_code`=`classes`.`code`


子查詢 WHERE

SELECT * FROM `students` WHERE id in (SELECT `id` FROM `students` WHERE dept=1);


SELECT * FROM `students` WHERE `school_num` in(select `school_num` from `student_scores` where `student_scores`.`score` >=80)


排名SQL語法

SELECT * FROM `student_scores` order by score desc ,school_num 

SELECT 
    school_num, 
    score,
    DENSE_RANK() OVER (ORDER BY score DESC, school_num ASC) AS rank
FROM 
    `student_scores`
ORDER BY 
    score DESC, 
    school_num ASC;
