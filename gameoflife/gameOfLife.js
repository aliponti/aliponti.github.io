/* Conway's Game of life with a 2-dimensional array
 *
 * Parameters:
 *
 * m ... height of the field
 * n ... width of the field
 * a ... n x m Array which contains the values
 *
 * Return:
 *
 * b ... n x m Array with the values after one step of the evolution
 */
function gameOfLife(m, n, a) {
	
	var b = new Array(m);
	
	for(var i = 0; i < m; i++){
	
		b[i] = new Array(n);
		for(var x = 0; x < n; x++){
			b[i][x] = 0;
		}
	}
	
	for (var y = 0; y < m; y++){
		
		/* neighbors ... Number of the neighbors of b[y][x] */
		for (var x = 0; x < n; x++){
			
			var neighbors = 0;
			
			for(var x1 = -1; x1 <= 1; x1++){
				for(var y1 = -1; y1 <= 1; y1++){	
					if( x+x1 >= 0 && x+x1 < n && y+y1 >= 0 && y+y1 < m ){	
						neighbors = neighbors + a[y+y1][x+x1];
					}	
				}
			}
			neighbors = neighbors - a[y][x];
			
			if(neighbors == 2){
				b[y][x] = a[y][x];	
			}
			if(neighbors == 3) {
				b[y][x] = 1;	
			}	
					
		}		
	}
	
	return b;
	
}