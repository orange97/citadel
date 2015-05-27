// file: ArriveTarget.cs
using UnityEngine;
using System.Collections;

public class ArriveTarget : MonoBehaviour {
	public GameObject playerGO;
	public const float MAX_SPEED = 500.0f;
	public const float DECELERATION_FACTOR = 0.6f;
	
	private float maxSpeedForFrame = 1;

	private void FixedUpdate () {
		maxSpeedForFrame = MAX_SPEED * Time.deltaTime;
		Vector3 source = transform.position;
		Vector3 target = playerGO.transform.position;

		Vector3 arriveVelocity = Arrive(source, target);
		arriveVelocity	= UsefulFunctions.ClampMagnitude( arriveVelocity, maxSpeedForFrame);
		rigidbody.AddForce( arriveVelocity );
		
		transform.LookAt( playerGO.transform );
		UsefulFunctions.DebugRay(transform.position, arriveVelocity, Color.blue);
		UsefulFunctions.DebugRay(transform.position, rigidbody.velocity, Color.yellow);
	}

	private Vector3 Arrive(Vector3 source, Vector3 target){				
		float distanceToTarget = Vector3.Distance(source, target);
		Vector3 directionToTarget = Vector3.Normalize( target - source );
		float speed = distanceToTarget / DECELERATION_FACTOR;
		Vector3 velocityToTarget = speed * directionToTarget;
		
		return velocityToTarget - rigidbody.velocity;
	}
}
