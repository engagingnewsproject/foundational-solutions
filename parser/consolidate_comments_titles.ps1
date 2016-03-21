
$sw = [Diagnostics.Stopwatch]::StartNew()

Write-host "`n... Start ...`n"

# csv to conslidate
$dir = "C:\Users\jrachner\Google Drive\JR Consulting Personal\Projects\Current\Dr Stroud\new_america_foundation.csv\"
$chopped = "nfa_chopped\"
$cleaned = "nfa_cleaned\"
$file = "new_america_foundation"
$ext = ".csv" 
$start = 1
$end = 1

Function Concatenate-Comment 
{ 
	param ($comment)
	
	$recordclean = ""
	$token = "`"`""
	
	if ($comment.length -eq 1)
	{
		if ($comment[0] -eq "N" -or $comment[0] -eq "")
		{
			# if no excerpt exists
			$recordclean += $comment[0]
		}
		else
		{
			try
			{
				$text = $comment[0].substring(1,$comment[0].length-2)
			}
			catch
			{
				$text = ""
			}
			$recordclean += $text -replace '"', "$token"
		}
	}
	else
	{
		$j = 0
		foreach ($a in $comment)
		{
			if ($j -eq 0)
			{
				$text = $a.substring(1)
				$textclean = $text -replace '"', "$token"
				$recordclean += $textclean + ","
			}
			elseif ($j -eq $comment.length-1)
			{
				$text = $a.substring(0,$a.length-1)
				$textclean = $text -replace '"', "$token"
				$recordclean += $textclean
			}
			else
			{
				$text = $a
				$textclean = $text -replace '"', "$token"
				$recordclean += $textclean + ","
			}
			$j++
		}
	}
	
	return $recordclean
}

try
{
	for ($i = $start; $i -le $end; $i++)
	{
		$path = $dir + $chopped + $file + $i + $ext
		
		# opens file for reading
		$reader = [System.IO.File]::OpenText($path)

		# incrementer
		$counter = 0

		# array of records
		$records = @()

		# captures each record
		$record = ""

		# create first file "_clean"
		try 
		{
			# create file path
			$cleanfile = $dir + $cleaned + $file + $i + $ext
			$clienfileTitles = $dir + $cleaned + $file + $i + "_titles" + $ext
			Write-Host $cleanfile -foregroundcolor yellow
			
			# delete files if exists
			if (Test-Path $cleanfile)
			{
				Remove-Item $cleanfile
			}
			if (Test-Path $clienfileTitles)
			{
				Remove-Item $clienfileTitles
			}

			for(;;) 
			{
				# incrememnt
				$counter++
			
				# get current line
				$line = $reader.ReadLine()
				
				# stop if last line
				if ($line -eq $null) { break }

				# add line to record
				#$record += $line
				
				$records += $line
				
				# no comma in line, end of record
				#try
				#{
				#	$last = $line.substring($line.length-1,1)
				#	if ($last -eq "N" -and $line.length -eq 1)
				#	{
				#		$record = $record -replace "\t", " "
				#		$records += $record
				#		$record
				#		$record = ""
				#	}				
				#	
				#	$last3 = $line.substring($line.length-3,3)
				#	if ($last3 -eq """0""" -or $last4 -eq """1""")
				#	{
				#		$record = $record -replace "\t", " "
				#		$records += $record
				#		$record
				#		$record = ""
				#	}	
				#}
				#catch
				#{	
				#}
			}
			
			$records.length
			
			Write-host "`n... Array Created ...`n" 
			
			$c = 0
			
			# create new file
			foreach ($record in $records)
			{
				if ($c -ne -1)
				{
					$record = $record -replace ",,,", ""
				
					# split record into array
					$recordSplit = $record.Split(",")
					
					$token2 = """"
					$title = $recordSplit[3] -replace "$token2", ""
					
					if ($true)
					{
						#$output = $dir + $cleaned + $file + $i + "_titles" + $ext
						#$record | out-file -filepath $output -append
					#}
					#else
					#{
						$found = $false
						$columnG = 0
						
						for ($x = 0; $x -lt $recordSplit.length-1; $x++)
						{
							if (!$found)
							{
								try
								{
									$col1 = $recordSplit[$x] -replace """", ""
									$col2 = $recordSplit[$x+1] -replace """", ""
									[DateTime]::ParseExact($col1,'yyyy-MM-dd HH:mm:ss',$null) > null
									[DateTime]::ParseExact($col2,'yyyy-MM-dd HH:mm:ss',$null) > null
									$columnG = $x
									$found = $true
								}
								catch
								{
								}
							}
						}
						
						# pull off first 4 columns
						$firstHalf = $recordSplit[0..2]
						
						# get comment values 1
						$endComment = $columnG-2
						$comment = $recordSplit[3..$endComment]
						
						write-host "`ncomment: " $comment
						
						# pull off middle 4 columns
						$middleStart = $columnG-1
						$middleEnd = $columnG+2
						$middleHalf = $recordSplit[$middleStart..$middleEnd]

						# get comment values 2
						$startExcerpt = $columnG+3
						$endExcerpt = $recordSplit.length-9
						$excerpt = $recordSplit[$startExcerpt..$endExcerpt]
						
						# pull off last 8 columns
						$afterComment = $recordSplit.length-8
						$endRecord = $recordSplit.length-1
						$lastHalf = $recordSplit[$afterComment..$endRecord]
						
						$j = 0
						# re-concatenate first part
						foreach ($a in $firstHalf)
						{
							if ($j -eq 0)
							{
								$newrecord += $a
							}
							else
							{
								$newrecord += "," + $a
							}
							$j++
						}
						
						# re-concatenate comment 1
						$token3 = """"","""""
						$recordclean = Concatenate-Comment $comment
						$recordclean = $recordclean -replace "$token3", ""","""
						$newrecord += ",""" + $recordclean + """"
						
						write-host "`nclean comment: " $recordclean
						
						# re-concatenate middle half
						foreach ($a in $middleHalf)
						{
							$newrecord += "," + $a
						}
						
						# re-concatenate comment 2
						$recordclean = Concatenate-Comment $excerpt
						if ($recordclean -eq "N" -or $recordclean -eq "")
						{
							$newrecord += "," + $recordclean
						}
						else
						{
							$newrecord += ",""" + $recordclean + """"
						}
						
						# re-concatenate last part
						foreach ($a in $lastHalf)
						{
							$newrecord += "," + $a
						}
						
						# write one record at a time
						$newrecord >> $cleanfile
						$newrecord = ""
					}
				}
				$c++
			}
		}
		catch
		{
			Write-host "bomb 1"
		}
		finally 
		{
			$reader.Close()
		}	
	}
}	
catch
{
	Write-host "bomb 2"
}

Write-host "`n... End ...`n"

$sw.Stop()
$mins = $sw.Elapsed.TotalMinutes

Write-host "`n... Took $mins Minutes ...`n"