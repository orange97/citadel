// file: ProfileScript4.cs
using UnityEngine;
using System.Collections;
using System;

 
public class ProfileScript4 : MonoBehaviour
{
	private int ITERATIONS = 2000;
	
	public Transform playerTransformCache;
	private SimpleMath mathObjectCache;
	private Vector3 pos1Cache = new Vector3();
	
	private void Awake(){
		mathObjectCache = GetComponent<SimpleMath>();
		pos1Cache = transform.position;
	}
	
	private void Start(){
		for(int i=0; i < ITERATIONS; i++){
			FindDistanceMethod1();
			FindDistanceMethod2();
			FindDistanceMethod3();
			FindDistanceMethod4();
		}
	}
		
	private void OnApplicationQuit()
	{
		Profile.PrintResults();
	}
	
	//------ method 1 --------
	
	private void FindDistanceMethod1(){
		Profile.StartProfile("Method-1");
		Vector3 pos1 = transform.position;
		Transform playerTransform = GameObject.FindGameObjectWithTag("Player").transform;
		Vector3 pos2 = playerTransform.position;
		float distance = Vector3.Distance(pos1, pos2);
		SimpleMath mathObject = GetComponent<SimpleMath>();
		float halfDistance = mathObject.Halve(distance);
		Profile.EndProfile("Method-1");
	}

	//------ method 2 --------
	private void FindDistanceMethod2(){
		Profile.StartProfile("Method-2");
		Vector3 pos1 = transform.position;
		Vector3 pos2 = playerTransformCache.position;
		float distance = Vector3.Distance(pos1, pos2);
		SimpleMath mathObject = GetComponent<SimpleMath>();
		float halfDistance = mathObject.Halve(distance);
		Profile.EndProfile("Method-2");
	}
	
	//------ method 3 --------
	private void FindDistanceMethod3(){
		Profile.StartProfile("Method-3");
		Vector3 pos2 = playerTransformCache.position;
		float distance = Vector3.Distance(pos1Cache, pos2);
		SimpleMath mathObject = GetComponent<SimpleMath>();
		float halfDistance = mathObject.Halve(distance);
		Profile.EndProfile("Method-3");
	}
	
	// ----- method 4 ----------
	private void FindDistanceMethod4(){
		Profile.StartProfile("Method-4");
		Vector3 pos2 = playerTransformCache.position;
		float distance = Vector3.Distance(pos1Cache, pos2);
		float halfDistance = mathObjectCache.Halve(distance);
		Profile.EndProfile("Method-4");
	}
}