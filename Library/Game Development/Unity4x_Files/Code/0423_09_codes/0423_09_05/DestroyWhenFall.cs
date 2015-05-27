// file: DestroyWhenFall.cs
using UnityEngine;
using System.Collections;

public class DestroyWhenFall : MonoBehaviour 
{
	private const float MIN_Y = -1;
	
	void Update () 
	{
		float y = transform.position.y;
		
		if( y < MIN_Y )
		{
			Destroy( gameObject);
		}
	
	}
}
